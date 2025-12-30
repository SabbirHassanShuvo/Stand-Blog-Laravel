# 📰 Stand Blog

A modern and responsive blog platform with three user roles: **Admin**, **Moderator**, and **User**.  
Built with **Laravel** for the backend and **Bootstrap** for the frontend.

---

## 🚀 Features

- Role-based user management: Admin, Moderator, User  
- Manual authentication logic – login, registration, logout  
- User profile update  
- Blog post creation, edit, delete (permissions based on role)  
- Image uploads with thumbnails  
- Comment system for posts  
- Posts listed by latest publish date  
- Responsive design for mobile and desktop  
- Admin dashboard for managing users, posts, and comments  

---

## 🛠 Project Setup

### 1. Clone the repository  
```bash
git clone https://github.com/SabbirHassanShuvo/stand-blog-project.git
cd stand-blog-project
```
### 2. Install dependencies
```
composer install
npm install
```
### 3. Configure environment
```
cp .env.example .env
```
Update database, mail service, and app settings in ```.env.```
### 4. Generate application key
```
php artisan key:generate
```
### 5. Run migrations
```
php artisan migrate
```
### 6. Start the development server
```
php artisan serve
```
Open http://localhost:8000 in your browser.

## 📁 File Structure

```
stand-blog-project/
│
├── app/
│   ├── Http/
│   │   ├── Controllers/
│   │   ├── Middleware/
│   │   └── Requests/
│   ├── Models/
│   └── Policies/
│
├── bootstrap/
├── config/
├── database/
│   ├── migrations/
│   └── seeders/
│
├── public/
│   ├── css/
│   ├── js/
│   └── uploads/
│
├── resources/
│   ├── views/
│   │   ├── layouts/
│   │   ├── auth/
│   │   ├── admin/
│   │   ├── moderator/
│   │   └── user/
│   └── sass/
│
├── routes/
│   └── web.php
│
├── .env.example
├── composer.json
├── package.json
└── README.md
```
## 💻 Tech Stack
Backend: Laravel

Frontend: Bootstrap 5, Blade Templates

Database: MySQL

Authentication Logic: Custom manual authentication with role-based permissions

Mail Service: SMTP (Mailtrap / Gmail)

## 👤 Author
Sabbir Hassan Shuvo
📧 mdsabbirhossan1337@gmail.com

🌐 Portfolio: https://sabbir-hassan.vercel.app/
