document.addEventListener('DOMContentLoaded', () => {
    const animatedElements = document.querySelectorAll('.animated');
    const observer = new IntersectionObserver((entries) => {
        entries.forEach(entry => {
            if (entry.isIntersecting) {
                entry.target.style.opacity = 1;
                entry.target.style.transform = 'translateY(0)';
            }
        });
    }, { threshold: 0.1 });

    animatedElements.forEach(el => observer.observe(el));

    const navbar = document.querySelector('.navbar');
    window.addEventListener('scroll', () => {
        if (window.scrollY > 50) {
            navbar.style.padding = '10px 0';
            navbar.style.backgroundColor = 'rgba(255, 255, 255, 0.98)';
        } else {
            navbar.style.padding = '20px 0';
            navbar.style.backgroundColor = 'rgba(255, 255, 255, 0.95)';
        }
    });
});

document.addEventListener('DOMContentLoaded', function() {
    const testimonials = {
            "testimonials": [
                {
                    "text": "Istri saya sangat terbantu.",
                    "author": "IamSecond"
                },
                {
                    "text": "Orangnya ramah sekali, friendly banget, sangat sangat recomended.",
                    "author": "Muria Rahmah"
                },
                {
                    "text": "Terima kasih atas rekomendasinya, Semoga program laktasi saya lancar.",
                    "author": "Ariesta Finda"
                },
                {
                    "text": "Sangat ramah dan bersahabat, super humble.",
                    "author": "Lia Wedding"
                },
                {
                    "text": "Baik bgt, ramah dan sangat informatif. Aku yang notabenenya introvert parah, nyaman banget buat utarain apapun itu.",
                    "author": "Silvia Eka Dewinta"
                },
                {
                    "text": "Pelayanan homecarenya sangat membantu, langsung praktik dan diarahkan. Semua kekhawatiranku dijawab dengan sangaaat sabar dan solutif. Recommended ⭐⭐⭐⭐⭐",
                    "author": "Utari Nur Pratiwi"
                },
                {
                    "text": "Konselor super ramahhhh, bisa banget kasih solusi buat newmoms dengan segala kendalanya❤️.",
                    "author": "Feby Rahmania"
                },
                {
                    "text": "Pelayanannya bagus baik, kakaknya ramah enak kalo diajak ngobrol dan langsung faham sama yang dijelaskan .. semoga sukses terus kak sehat selalu supaya bisa selalu membimbing kami semua para Calon Ibu dan Ibu Yang baik buat calon anak anak.",
                    "author": "Intan Mayang Sari Sudarsono"
                },
                {
                    "text": "Sebagai ibu baru yang serba kebingungan perihal mengasihi, apalagi jika asi tidak keluar. Semoga setelah ini saya dipermudah untuk mengasihi.",
                    "author": "Bana Na"
                },
                {
                    "text": "Sangat telaten dan komunikatif. Very Good ⭐️⭐️⭐️⭐️⭐️.",
                    "author": "Mee Dayu"
                },
                {
                    "text": "Seneng bgt nemu konselor yg bs klik n cpt nyambungnya. Sangat sabar, informatif n solutif. Alhamdulillah mulai ada progress utk relaktasi krn babyku bingput. Semoga bisa mengAsihi terus.",
                    "author": "Ochi Ivona Devi"
                },
                {
                    "text": "Waktu itu syaa sudha struggle bget karna dbf yg g lancar. Akhirnya ketemu sma mb Septi yg ngajarin saya dbf yg benar. Ornangnya baik dan ramah. Alhamdulillah setelah konsuktasi sma mba Septi udah bisa dbf dengan lncar. Terimakasih mb Septi untuk bimbingnaya.",
                    "author": "Niswah Qonita"
                },
                {
                    "text": "Syg bintangnya cuma 5.. kalau bisa bintangnya sampe 10 nih sangking bagusnya layanan konseling disini 👍.",
                    "author": "Dahana Yudha"
                },
                {
                    "text": "Terima kasih. Sarannya sangat membantu menenangkan. Jadi nemu beberapa solusi yg bisa diterapkan di masalah menyusui.",
                    "author": "Siti Nuranisah"
                },
                {
                    "text": "Ownernya Super duper ramah, detail penjelasannya untuk yg baru punya newborn, terima kasih banyak mbak Septi.",
                    "author": "Muhammad Erdi Nurzaman"
                },
                {
                    "text": "Kakaknya sangat baik, menjawab segala kebingungan new parent terutama. Gercep sekali balasnya. Suksea terus.",
                    "author": "Retno Ritasari"
                },
                {
                    "text": "Alhamdulillah habis sharing soal menyusui jd ga bingung lagi sbg new mom. Konselornya pintar, cara menjelaskannya juga baik & selalu memberikan solusi. Semoga asinya lancar terus & bisa dbf. Aamiin.",
                    "author": "Nudia Nafilamy"
                },
                {
                    "text": "Konselor laktasinya yang komunikatif berwawasan, ramah, ga rugi pokoknya ke sini. Sejak baby masih umur hitung an hari konsultasi ke mba Septi terutama perkara Asi, perkara kondisi bayi, dan saat ini udah 9 bulan lanjut perkara mpasi.",
                    "author": "Rezi Delfianti"
                },
                {
                    "text": "Mba Septi baik banget, ngga melulu soal uang, digali dulu keluhannya apa. Baru dari situ ngasih pertimbangan perlu sampai homevisit atau engga. Dan langsung dikasih saran biar bisa cepet pulih. Terimakasih banyak mba Septi ❤️❤️.",
                    "author": "Pramudita Ardiiantii"
                },
                {
                    "text": "Materi yang disampaikan sangat membantu ibu yang mengalami kendala dalam pemberian asi kepada bayi. Terima kasih banyak mbak Septi atas saran yang diberikan semoga Allah selalu lancarkan dan mudahkan urusan kita 😊.",
                    "author": "Inggar Tri"
                },
                {
                    "text": "Sukak. Ownernya ramah sekali, sabar dn telaten. Buat pejuang asi yang butuh bimbingan atau teman sharing bisa ke mbk Septi. Mskh ya mbk Septi, semoga kedepannya aku bisa lebih baik dn bisa asi full.",
                    "author": "Azfar Pranaja27"
                },
                {
                    "text": "Halo.. kalian yg ingin sharing / butuh edukasi terkait per ASI an, langsung aja hubungi wa diatas. Pengalaman saya baru hubungi 1x sudah responnya seperti kenal lama. Very good service 👍.",
                    "author": "Hidayatul Hurriyah"
                },
                {
                    "text": "Masya Allah, positif vibes nya kerasa banget bikin kita para busui itu gak perlu terlalu worry. Terimakasih, best konselor pokoknya.",
                    "author": "Meyta Putri Anggraini"
                },
                {
                    "text": "Pengalamanku saat sharing sama mba Septi orang.nya informatif banget fast respon ramah kayak teman sendiri gak sungkan buat cerita keluh kesah per-Asi-an.. terimakasih banyak nggeh mba Uda bantu saya,, semoga lancar terus,, sehat2 terus 🌹♥️.",
                    "author": "Jini Jono"
                },
                {
                    "text": "Masya Allah akhirnya bisa curhat tentang keluh kesah sy sebagai new mom. Senang sekali bisa curhat sama mba Septi meskipun baru dari chat, orangnya ramah.sabar saat ditanya. Terima kasih mbk Septi atas saran dan masukannya..sehat selalu dan dilancarkan rezekinya 😍😍.",
                    "author": "Riska Ari Santi"
                },
                {
                    "text": "Seneng banget bisa ketemu sama mbak Septi😍😍 banyak tips dan ilmu baru mengenai sumbatan asi yg mensabotase produksi asi ku, Alhamdulillah asi ku sekarang kembali lancar tanpa ada sumbatan lagi. Area sidoarjo surabaya yg punya masalah kyk aku cuss ketemu mbak Septi ajaaahhh 🏻 🏻 🏻.",
                    "author": "Angelia Rizqi Kinanti"
                },
                {
                    "text": "Bener2 konsulnya kyk sama temen sendiri. tidak ada judgmental apapunnn. ngga ngerasa dihakimi juga. bener2 membantu bgt. yg cari konselor laktasi rasa temen plis disini ajaaa mba septinya curhatable jg😂.",
                    "author": "Sholikatun Nisa"
                },
                {
                    "text": "Alhamdulillah dipertemukan dengan konselor laktasi yang super sabar, sangat komunikatif, fast respon, pokoknya mengayomi pasien banget. Ilmunya juga mumpuni.",
                    "author": "Citra Aulya"
                },
                {
                    "text": "Udah lama bgt pengen konsul. Cari, dan dapetlah Mba Septi ❤️.",
                    "author": "Mariana Putri"
                }
            ]        
    };

    const carouselInner = document.querySelector('#testimonialCarousel .carousel-inner');

    testimonials.testimonials.forEach((testimonial, index) => {
        const carouselItem = document.createElement('div');
        carouselItem.className = `carousel-item ${index === 0 ? 'active' : ''}`;
        
        carouselItem.innerHTML = `
            <div class="text-center">
                <p class="lead">"${testimonial.text}"</p>
                <p><strong>${testimonial.author}</strong></p>
                <div class="testimonial-stars">
                    <i class="fas fa-star"></i>
                    <i class="fas fa-star"></i>
                    <i class="fas fa-star"></i>
                    <i class="fas fa-star"></i>
                    <i class="fas fa-star"></i>
                </div>
            </div>
        `;
        
        carouselInner.appendChild(carouselItem);
    });
});