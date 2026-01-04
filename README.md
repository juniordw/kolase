# KOLASE - Konselor Laktasi Sepanjang

![Laravel](https://img.shields.io/badge/Laravel-12.x-FF2D20?style=flat&logo=laravel)
![PHP](https://img.shields.io/badge/PHP-8.3+-777BB4?style=flat&logo=php)
![TailwindCSS](https://img.shields.io/badge/TailwindCSS-3.4+-38B2AC?style=flat&logo=tailwind-css)

Professional breastfeeding consultation service website with online booking system, blog, and WhatsApp notifications.

## 📋 Table of Contents

- [Features](#features)
- [Tech Stack](#tech-stack)
- [Requirements](#requirements)
- [Installation](#installation)
- [Configuration](#configuration)
- [Database Setup](#database-setup)
- [WhatsApp Integration](#whatsapp-integration)
- [Admin Panel](#admin-panel)
- [Usage](#usage)
- [Project Structure](#project-structure)
- [License](#license)

## ✨ Features

### Public Website
- 🏠 **Homepage** - Hero section, services overview, testimonials, latest articles
- 📋 **Services Catalog** - 7 lactation consultation services with detailed information
- 📅 **Online Booking System** - Multi-step booking form with 5 steps
- 📝 **Blog/Articles** - Article system with categories, tags, search, and pagination
- 📱 **WhatsApp Integration** - Automatic notifications for bookings and reminders
- 💬 **Contact Form** - Direct contact with automatic email notifications
- 📖 **Static Pages** - About, FAQ, Privacy Policy, Terms & Conditions
- 🎨 **Responsive Design** - Mobile-first approach with Tailwind CSS
- 🔍 **SEO Optimized** - Meta tags, structured data, semantic HTML

### Admin Panel
- 🔐 **Authentication** - Session-based admin login
- 📊 **Dashboard** - Statistics, recent bookings, popular services
- 👥 **Booking Management** - View, filter, search, update booking status
- 🛎️ **Service Management** - CRUD operations for services
- ⭐ **Testimonial Management** - Approve/reject client testimonials
- 📱 **WhatsApp Notifications** - Automatic status update notifications

### WhatsApp Notifications
- ✅ Booking confirmation to client
- 🔔 New booking alert to admin
- ⏰ H-1 reminder before consultation
- 📋 Status update notifications

## 🛠 Tech Stack

- **Backend:** Laravel 12.44.0 (PHP 8.3+)
- **Frontend:** Blade Templates + Alpine.js 3.x
- **Styling:** Tailwind CSS 3.4+
- **Database:** MySQL 8.0+
- **Build Tool:** Vite
- **Icons:** Heroicons (SVG)
- **WhatsApp API:** Fonnte/Wablas/Woowa compatible

## 📦 Requirements

- PHP >= 8.3
- Composer
- Node.js >= 18.x & NPM
- MySQL >= 8.0
- Apache/Nginx web server

## 🚀 Installation

### 1. Clone Repository

```bash
git clone https://github.com/your-repo/kolase.git
cd kolase
```

### 2. Install PHP Dependencies

```bash
composer install
```

### 3. Install Node Dependencies

```bash
npm install
```

### 4. Environment Configuration

```bash
cp .env.example .env
```

Generate application key:

```bash
php artisan key:generate
```

### 5. Configure Database

Edit `.env` file:

```env
DB_CONNECTION=mysql
DB_HOST=127.0.0.1
DB_PORT=3306
DB_DATABASE=kolase
DB_USERNAME=root
DB_PASSWORD=your_password
```

### 6. Run Migrations & Seeders

```bash
# Run migrations
php artisan migrate

# Seed database with sample data
php artisan db:seed --class=ServiceSeeder
php artisan db:seed --class=AdminSeeder
php artisan db:seed --class=ArticleSeeder
```

**Default Admin Credentials:**
- Email: `admin@kolase.com`
- Password: `password`

### 7. Build Assets

```bash
# Development
npm run dev

# Production
npm run build
```

### 8. Start Development Server

```bash
php artisan serve
```

Visit: http://localhost:8000

## ⚙️ Configuration

### WhatsApp API Setup

See detailed guide: [WHATSAPP_SETUP.md](WHATSAPP_SETUP.md)

Quick setup in `.env`:

```env
WHATSAPP_API_URL=https://api.fonnte.com/send
WHATSAPP_API_KEY=your_api_key_here
WHATSAPP_ADMIN_PHONE=6289560622054
```

### Scheduled Tasks (Cron)

Add to crontab for H-1 reminders:

```cron
* * * * * cd /path-to-kolase && php artisan schedule:run >> /dev/null 2>&1
```

### Mail Configuration

Configure mail settings in `.env`:

```env
MAIL_MAILER=smtp
MAIL_HOST=smtp.gmail.com
MAIL_PORT=587
MAIL_USERNAME=your_email@gmail.com
MAIL_PASSWORD=your_app_password
MAIL_ENCRYPTION=tls
MAIL_FROM_ADDRESS=noreply@kolase.com
MAIL_FROM_NAME="KOLASE"
```

## 🗄 Database Setup

### Database Schema

The application uses 18 database tables:

**Core Tables:**
- `services` - Lactation services catalog
- `consultations` - Booking records
- `testimonials` - Client testimonials
- `admins` - Admin users

**Blog System:**
- `articles` - Blog articles
- `article_categories` - Article categories
- `article_tags` - Article tags
- `article_category` - Pivot table (articles ↔ categories)
- `article_tag` - Pivot table (articles ↔ tags)

**Configuration:**
- `schedules` - Available time slots
- `blocked_dates` - Unavailable dates
- `settings` - System settings

**System:**
- `sessions` - User sessions
- `cache` - Application cache
- `jobs` - Queue jobs
- `job_batches` - Batch jobs
- `failed_jobs` - Failed queue jobs

### Sample Data

After running seeders, you'll have:

- **7 Services** - All lactation services from specification
- **1 Admin User** - admin@kolase.com / password
- **5 Articles** - Sample blog articles
- **5 Categories** - Article categories
- **10 Tags** - Article tags

## 📱 WhatsApp Integration

### Features

1. **Booking Confirmation** - Sent immediately after booking
2. **Admin Alert** - Notifies admin of new bookings
3. **H-1 Reminder** - Sent daily at 9 AM for next day bookings
4. **Status Updates** - Sent when status changes

### Testing

```bash
# Test reminder command manually
php artisan bookings:send-reminders

# Check scheduled tasks
php artisan schedule:list
```

### API Providers

Compatible with:
- Fonnte (recommended)
- Wablas
- Woowa

See [WHATSAPP_SETUP.md](WHATSAPP_SETUP.md) for detailed setup.

## 🔐 Admin Panel

Access: http://localhost:8000/admin/login

**Default Credentials:**
- Email: `admin@kolase.com`
- Password: `password`

### Admin Features

**Dashboard:**
- Total bookings count
- Pending/confirmed/completed statistics
- Recent bookings list
- Popular services chart

**Consultation Management:**
- View all bookings with filters
- Search by booking code, name, phone
- Filter by status and date range
- Update booking status
- View detailed booking information
- Send WhatsApp notifications on status change

**Service Management:**
- Create/edit/delete services
- Manage service features and pricing
- Set service availability
- Upload service images

**Testimonial Management:**
- Approve/reject testimonials
- View client feedback
- Feature testimonials on homepage

## 📖 Usage

### Creating a Booking

1. Visit `/booking` or `/jadwal`
2. Select service and consultation type
3. Choose date and time slot
4. Fill in mother and baby information
5. Enter concerns and notes
6. Review and confirm
7. Receive booking code and WhatsApp confirmation

### Writing Articles

1. Login to admin panel
2. Navigate to Articles section
3. Create new article
4. Assign categories and tags
5. Add SEO metadata
6. Publish article

### Managing Bookings

1. View all bookings in admin panel
2. Filter by status or date
3. Click booking to view details
4. Update status (pending → confirmed → completed)
5. Client receives WhatsApp notification automatically

## 📁 Project Structure

```
kolase/
├── app/
│   ├── Console/Commands/
│   │   └── SendBookingReminders.php
│   ├── Http/
│   │   ├── Controllers/
│   │   │   ├── Admin/
│   │   │   │   ├── AuthController.php
│   │   │   │   ├── ConsultationController.php
│   │   │   │   ├── DashboardController.php
│   │   │   │   ├── ServiceManagementController.php
│   │   │   │   └── TestimonialController.php
│   │   │   ├── ArticleController.php
│   │   │   ├── BookingController.php
│   │   │   ├── ContactController.php
│   │   │   ├── HomeController.php
│   │   │   ├── PageController.php
│   │   │   └── ServiceController.php
│   │   └── Middleware/
│   │       └── AdminAuth.php
│   ├── Models/
│   │   ├── Admin.php
│   │   ├── Article.php
│   │   ├── ArticleCategory.php
│   │   ├── ArticleTag.php
│   │   ├── BlockedDate.php
│   │   ├── Consultation.php
│   │   ├── Schedule.php
│   │   ├── Service.php
│   │   ├── Setting.php
│   │   └── Testimonial.php
│   └── Services/
│       └── WhatsAppService.php
├── database/
│   ├── migrations/
│   └── seeders/
│       ├── AdminSeeder.php
│       ├── ArticleSeeder.php
│       └── ServiceSeeder.php
├── resources/
│   ├── css/
│   │   └── app.css
│   ├── js/
│   │   └── app.js
│   └── views/
│       ├── admin/
│       │   ├── consultations/
│       │   ├── services/
│       │   ├── testimonials/
│       │   ├── dashboard.blade.php
│       │   ├── layout.blade.php
│       │   └── login.blade.php
│       ├── articles/
│       │   ├── category.blade.php
│       │   ├── index.blade.php
│       │   └── show.blade.php
│       ├── booking/
│       │   ├── index.blade.php
│       │   └── success.blade.php
│       ├── layouts/
│       │   └── app.blade.php
│       ├── services/
│       │   ├── index.blade.php
│       │   └── show.blade.php
│       └── home.blade.php
├── routes/
│   ├── console.php
│   └── web.php
├── .env.example
├── README.md
├── WHATSAPP_SETUP.md
├── composer.json
├── package.json
├── tailwind.config.js
└── vite.config.js
```

## 🎨 Brand Colors

```css
/* Primary Colors */
--rose-600: #E11D48
--rose-500: #F43F5E
--rose-100: #FFE4E6

/* Secondary Colors */
--mauve: #A78295
--mauve-dark: #8B6D7F

/* Neutral Colors */
--cream-50: #FFFBF5
--brown-700: #5D4E37
```

## 🔒 Security

- Session-based authentication for admin
- CSRF protection on all forms
- SQL injection prevention via Eloquent ORM
- XSS protection with Blade escaping
- Password hashing with bcrypt
- Secure WhatsApp API key storage in .env

## 📝 License

This project is proprietary software developed for KOLASE.

---

**Developed by:** KOLASE Development Team
**Version:** 1.0.0
**Last Updated:** January 2026
**Laravel Version:** 12.44.0

## 🆘 Support

For technical support or questions:

- Email: dev@kolase.com
- WhatsApp: +62 895-6062-2054
- Documentation: See individual markdown files

## 🙏 Acknowledgments

- Laravel Framework
- Tailwind CSS
- Alpine.js
- Heroicons
- WhatsApp API Providers (Fonnte)
