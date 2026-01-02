# 🌌 Cinematic Personal Portfolio & CMS

A premium, full-stack personal portfolio website built with PHP, Vanilla CSS, and Tailwind CSS. Featuring a cinematic space-themed UI, high-end animations, and a custom mini-CMS for managing projects, blogs, and testimonials.

![Portfolio Preview](assets/images/cinematic_earth_hero.png)

## ✨ Features

- **🚀 Cinematic Hero Section**: Breathtaking space-themed hero with a rotating Earth background (optimized for both light/dark modes).
- **🎭 Dual Theme Support**: Seamless transition between sophisticated dark and clean light modes.
- **🌌 Atmospheric Animations**: Dynamic starfield, floating glow orbs, and interactive skill progress bars using pure JS and CSS.
- **🛠 Professional Toolbox**: Visual skill cards with tech-specific hover effects and custom shadows.
- **📰 Mini-CMS Admin Panel**: Secure dashboard to manage:
  - **Projects**: Showcase work with Cloudinary image integration.
  - **Blog**: Full-featured blog system with category filtering.
  - **Testimonials**: Manage client feedback with easy image uploads.
  - **Messages**: Direct contact form integration for potential clients.
- **💎 Premium Design**: Leverages glassmorphism, soft glows, and smooth transitions for a "WOW" factor.

## 🛠 Tech Stack

- **Frontend**: HTML5, Vanilla CSS (Design Tokens), Tailwind CSS (Utilities), JavaScript (ES6+).
- **Backend**: PHP 8.x (PDO for secure DB interaction).
- **Database**: MySQL.
- **Media Hosting**: Cloudinary API (for project and profile image uploads).
- **Animations**: Font Awesome, Google Fonts, and custom CSS Keyframes.

## 🚀 Getting Started

### Prerequisites
- PHP >= 7.4
- MySQL
- Composer (Optional, but useful for Cloudinary SDK if expanded)

### Installation

1. **Clone the repository**:
   ```bash
   git clone https://github.com/Joshz-090/my-portfolio.git
   cd my-portfolio
   ```

2. **Database Setup**:
   - Create a new MySQL database (e.g., `eyasu_portfolio`).
   - Import the `database/schema.sql` file into your database.

3. **Configuration**:
   - Rename `config/db.php.example` to `config/db.php` and update your database credentials.
   - Rename `config/cloudinary_config.php.example` to `config/cloudinary_config.php` and add your Cloudinary details.

4. **Run Local Server**:
   If using XAMPP, place the folder in `htdocs` and access via `http://localhost/port/`.

## 🛡 Security Warnings

> [!WARNING]
> This project contains sensitive configuration files. Please ensure `config/db.php` and `config/cloudinary_config.php` are added to your `.gitignore` before pushing to any public repository. Never share your **Cloudinary API Secret** or **Database Passwords**.

## 📄 License

This project is open-source and available under the [MIT License](LICENSE).

---
Developed with ❤️ by [Eyasu Zerihun](https://github.com/Joshz-090)
