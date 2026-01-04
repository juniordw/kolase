# WhatsApp API Integration - Setup Guide

## Overview

The KOLASE website includes WhatsApp notification functionality to automatically send messages to clients and admins for:

1. **Booking Confirmation** - Sent to client immediately after booking
2. **Admin Notification** - Sent to admin when new booking is created
3. **H-1 Reminder** - Sent to client one day before scheduled consultation
4. **Status Updates** - Sent when booking status changes (confirmed, completed, cancelled)

## Supported WhatsApp API Providers

The implementation is compatible with popular Indonesian WhatsApp API providers:

- **Fonnte** (https://fonnte.com) - Recommended, reliable
- **Wablas** (https://wablas.com)
- **Woowa** (https://woowa.id)

All use similar HTTP API structures with `target` and `message` parameters.

## Setup Instructions

### 1. Choose and Register with WhatsApp API Provider

**Option A: Fonnte (Recommended)**

1. Visit https://fonnte.com
2. Register for an account
3. Purchase credit (starting from Rp 150.000 for 1000 messages)
4. Get your API token from the dashboard

**Option B: Wablas**

1. Visit https://wablas.com
2. Register and verify your WhatsApp number
3. Purchase package (starting from Rp 50.000/month)
4. Get your API token

**Option C: Woowa**

1. Visit https://woowa.id
2. Register for an account
3. Choose a plan
4. Get your API credentials

### 2. Configure Environment Variables

Copy the WhatsApp configuration from `.env.example` to your `.env` file:

```bash
# WhatsApp API Configuration
WHATSAPP_API_URL=https://api.fonnte.com/send
WHATSAPP_API_KEY=your_api_key_here
WHATSAPP_ADMIN_PHONE=6289560622054
```

**For Fonnte:**
```env
WHATSAPP_API_URL=https://api.fonnte.com/send
WHATSAPP_API_KEY=your_fonnte_token
WHATSAPP_ADMIN_PHONE=6289560622054
```

**For Wablas:**
```env
WHATSAPP_API_URL=https://api.wablas.com/send-message
WHATSAPP_API_KEY=your_wablas_token
WHATSAPP_ADMIN_PHONE=6289560622054
```

**For Woowa:**
```env
WHATSAPP_API_URL=https://api.woowa.id/send
WHATSAPP_API_KEY=your_woowa_token
WHATSAPP_ADMIN_PHONE=6289560622054
```

### 3. Test WhatsApp Integration

#### Test via Laravel Tinker

```bash
php artisan tinker
```

Then run:

```php
// Load a consultation
$consultation = App\Models\Consultation::first();

// Create WhatsApp service instance
$whatsapp = new App\Services\WhatsAppService();

// Test booking confirmation
$whatsapp->sendBookingConfirmation($consultation);

// Test admin notification
$whatsapp->sendAdminNotification($consultation);

// Test reminder
$whatsapp->sendReminder($consultation);
```

#### Test Status Update

```php
$whatsapp->sendStatusUpdate($consultation, 'pending', 'confirmed');
```

### 4. Setup Scheduled Tasks (Cron)

The reminder system uses Laravel's task scheduler to send H-1 reminders daily at 9:00 AM.

#### On Production Server (Linux)

Add this line to your crontab:

```bash
crontab -e
```

Add:

```cron
* * * * * cd /path-to-your-project && php artisan schedule:run >> /dev/null 2>&1
```

#### On Development (Windows - XAMPP)

Use Windows Task Scheduler:

1. Open Task Scheduler
2. Create Basic Task
3. Set trigger: Daily at 9:00 AM
4. Action: Start a Program
5. Program: `C:\xampp\php\php.exe`
6. Arguments: `C:\xampp\htdocs\kolase\artisan schedule:run`

#### Manual Testing

Run manually to test:

```bash
php artisan bookings:send-reminders
```

This will check for bookings scheduled for tomorrow and send reminders.

### 5. Verify Scheduled Task is Registered

```bash
php artisan schedule:list
```

You should see:

```
0 9 * * * bookings:send-reminders .... Next Due: Tomorrow at 9:00 AM
```

## WhatsApp Service Methods

### Available Methods

#### `sendBookingConfirmation(Consultation $consultation)`

Sends booking confirmation to client with:
- Booking code
- Service details
- Scheduled date and time
- Client information
- Next steps

#### `sendAdminNotification(Consultation $consultation)`

Sends new booking alert to admin with:
- Booking details
- Client information
- Baby information
- Client concerns
- Action required reminder

#### `sendReminder(Consultation $consultation)`

Sends H-1 reminder to client with:
- Booking details
- Preparation checklist
- Reschedule information

#### `sendStatusUpdate(Consultation $consultation, string $oldStatus, string $newStatus)`

Sends status change notification with appropriate message based on new status:
- `confirmed` - Booking confirmed message
- `completed` - Thank you message with testimonial request
- `cancelled` - Cancellation confirmation

## Notification Flow

### 1. New Booking
```
User submits booking → BookingController@store → WhatsAppService
                    ↓
            [Client receives confirmation]
            [Admin receives notification]
```

### 2. Status Update
```
Admin updates status → ConsultationController@updateStatus → WhatsAppService
                    ↓
            [Client receives status update]
```

### 3. Daily Reminders
```
Scheduler (9 AM daily) → SendBookingReminders Command → WhatsAppService
                    ↓
            [Clients with tomorrow's bookings receive reminder]
```

## Phone Number Format

The service automatically formats phone numbers:

- **Input:** `089560622054` or `+6289560622054` or `089560622054`
- **Output:** `6289560622054` (cleaned, with country code)

No need to format numbers before passing to the service.

## Error Handling

All WhatsApp sending is wrapped in try-catch blocks:

- Errors are logged to `storage/logs/laravel.log`
- Booking/status updates will NOT fail if WhatsApp sending fails
- Check logs for debugging: `tail -f storage/logs/laravel.log`

## Message Templates

All message templates are defined in `app/Services/WhatsAppService.php`.

To customize messages, edit the respective methods:
- `sendBookingConfirmation()` - lines 28-60
- `sendAdminNotification()` - lines 67-109
- `sendReminder()` - lines 116-147
- `sendStatusUpdate()` - lines 188-199

## Logging

All WhatsApp activities are logged:

**Success logs:**
```
[INFO] WhatsApp message sent successfully
- booking_code: KLS-ABC123
- phone: 6289560622054
```

**Error logs:**
```
[ERROR] WhatsApp API error
- booking_code: KLS-ABC123
- status: 401
- response: {"status":false,"message":"Invalid token"}
```

## Troubleshooting

### Messages Not Sending

1. **Check API credentials**
   ```bash
   php artisan tinker
   >>> config('services.whatsapp.api_key')
   ```

2. **Check API URL**
   ```bash
   >>> config('services.whatsapp.api_url')
   ```

3. **Test API directly with curl**
   ```bash
   curl -X POST https://api.fonnte.com/send \
     -H "Authorization: YOUR_API_KEY" \
     -d "target=6289560622054" \
     -d "message=Test message"
   ```

4. **Check logs**
   ```bash
   tail -f storage/logs/laravel.log
   ```

### Reminders Not Sending

1. **Check cron is running**
   ```bash
   php artisan schedule:list
   ```

2. **Run command manually**
   ```bash
   php artisan bookings:send-reminders
   ```

3. **Check if there are bookings for tomorrow**
   ```bash
   php artisan tinker
   >>> App\Models\Consultation::where('status', 'confirmed')->whereDate('scheduled_date', now()->addDay())->count()
   ```

### API Quota Exceeded

- Check your remaining credit on the API provider dashboard
- Purchase additional credit/package
- Logs will show quota errors

## API Provider Documentation

- **Fonnte:** https://docs.fonnte.com/
- **Wablas:** https://wablas.com/api-docs
- **Woowa:** https://docs.woowa.id/

## Security Notes

- **Never commit `.env` file** - API keys should remain secret
- Use different API keys for development and production
- Regularly rotate API keys
- Monitor API usage for suspicious activity
- Keep API provider account secured with 2FA

## Cost Estimation

**Fonnte Pricing Example:**

- 1000 messages = Rp 150.000 (Rp 150/message)
- Per booking: 2 messages (client + admin) = Rp 300
- 100 bookings/month = Rp 30.000/month
- Add reminders: ~Rp 15.000/month
- **Total: ~Rp 50.000/month for 100 bookings**

**Wablas Pricing:**

- Paket Lite: Rp 50.000/month (unlimited messages to 1 device)
- Suitable for small businesses

Choose based on your booking volume and budget.

## Support

For issues with:
- **WhatsApp Service Code:** Check `app/Services/WhatsAppService.php`
- **API Provider:** Contact their support
- **Laravel Integration:** Check Laravel logs and documentation

---

**Last Updated:** January 2026
**Laravel Version:** 12.x
**Author:** KOLASE Development Team
