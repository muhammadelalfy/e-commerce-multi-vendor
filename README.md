# 🛒 E-commerce Multi-Vendor Platform

> A comprehensive, scalable multi-vendor marketplace built with Laravel 10, featuring advanced vendor management, secure payment processing, and real-time notifications.

[![Laravel](https://img.shields.io/badge/Laravel-10.x-red.svg)](https://laravel.com)
[![PHP](https://img.shields.io/badge/PHP-8.1+-blue.svg)](https://php.net)
[![Tailwind CSS](https://img.shields.io/badge/Tailwind_CSS-3.1+-38B2AC.svg)](https://tailwindcss.com)
[![Vite](https://img.shields.io/badge/Vite-5.0+-646CFF.svg)](https://vitejs.dev)
[![License](https://img.shields.io/badge/License-MIT-green.svg)](LICENSE)

## 🚀 Features

### **Multi-Vendor Management**
- **Vendor Registration & Approval** - Secure vendor onboarding process
- **Vendor Dashboard** - Comprehensive management interface
- **Commission System** - Flexible revenue sharing models
- **Vendor Analytics** - Performance metrics and insights

### **Product Management**
- **Advanced Catalog System** - Categories, subcategories, and attributes
- **Inventory Management** - Real-time stock tracking and alerts
- **Product Variations** - Size, color, and custom options
- **Bulk Import/Export** - CSV/Excel support for large catalogs

### **E-commerce Core**
- **Shopping Cart** - Persistent cart with guest checkout
- **Order Management** - Complete order lifecycle tracking
- **Payment Integration** - Multiple payment gateways
- **Shipping & Tax** - Configurable shipping zones and tax rates

### **User Experience**
- **Responsive Design** - Mobile-first approach with Tailwind CSS
- **Advanced Search** - Product filtering and search functionality
- **Wishlist & Reviews** - Customer engagement features
- **Real-time Updates** - Live notifications with Pusher

### **Security & Performance**
- **Authentication** - Laravel Fortify with Sanctum
- **Role-based Access** - Granular permissions system
- **API Security** - Rate limiting and validation
- **Caching** - Redis integration for performance

## 🛠️ Technology Stack

### **Backend**
- **Laravel 10.x** - Modern PHP framework
- **PHP 8.1+** - Latest PHP features and performance
- **MySQL** - Reliable database system
- **Redis** - Caching and session storage

### **Frontend**
- **Tailwind CSS 3.1** - Utility-first CSS framework
- **Alpine.js** - Lightweight JavaScript framework
- **Vite 5.0** - Fast build tool and dev server
- **Axios** - HTTP client for API calls

### **Real-time Features**
- **Pusher** - Real-time notifications and updates
- **Laravel Echo** - WebSocket integration
- **Event Broadcasting** - Live system events

### **Development Tools**
- **Laravel Sail** - Docker development environment
- **Laravel Pint** - Code style fixer
- **PHPUnit** - Testing framework
- **Faker** - Data generation for testing

## 📁 Project Structure

```
e-commerce-multi-vendor/
├── app/
│   ├── Actions/          # Business logic actions
│   ├── Events/           # Event classes
│   ├── Facades/          # Application facades
│   ├── Helpers/          # Helper functions
│   ├── Http/             # Controllers and middleware
│   ├── Listeners/        # Event listeners
│   ├── Models/           # Eloquent models
│   ├── Notifications/    # Notification classes
│   ├── Observers/        # Model observers
│   ├── Providers/        # Service providers
│   ├── Repositories/     # Data access layer
│   └── Traits/           # Reusable traits
├── database/              # Migrations and seeders
├── resources/             # Views and assets
├── routes/                # Application routes
├── storage/               # File storage
├── tests/                 # Test files
└── config/                # Configuration files
```

## 🚀 Quick Start

### **Prerequisites**
- PHP 8.1 or higher
- Composer
- Node.js 16+ and npm
- Docker (optional, for Laravel Sail)

### **Installation**

1. **Clone the repository**
   ```bash
   git clone https://github.com/muhammadelalfy/e-commerce-multi-vendor.git
   cd e-commerce-multi-vendor
   ```

2. **Install PHP dependencies**
   ```bash
   composer install
   ```

3. **Install Node.js dependencies**
   ```bash
   npm install
   ```

4. **Environment setup**
   ```bash
   cp .env.example .env
   php artisan key:generate
   ```

5. **Database setup**
   ```bash
   php artisan migrate
   php artisan db:seed
   ```

6. **Build assets**
   ```bash
   npm run build
   ```

7. **Start development server**
   ```bash
   php artisan serve
   npm run dev
   ```

### **Docker Setup (Alternative)**
```bash
./vendor/bin/sail up -d
```

## 🔧 Configuration

### **Environment Variables**
```env
DB_CONNECTION=mysql
DB_HOST=127.0.0.1
DB_PORT=3306
DB_DATABASE=ecommerce
DB_USERNAME=root
DB_PASSWORD=

PUSHER_APP_ID=your_pusher_app_id
PUSHER_APP_KEY=your_pusher_key
PUSHER_APP_SECRET=your_pusher_secret
PUSHER_HOST=
PUSHER_PORT=443
PUSHER_SCHEME=https
PUSHER_APP_CLUSTER=mt1
```

### **Payment Gateways**
Configure your preferred payment gateways in the `.env` file:
- Stripe
- PayPal
- Local payment methods

## 📊 Database Schema

The application includes comprehensive database design for:
- **Users & Authentication** - Customer and vendor accounts
- **Products & Categories** - Hierarchical product organization
- **Orders & Transactions** - Complete order management
- **Vendor Management** - Multi-tenant architecture
- **Reviews & Ratings** - Customer feedback system

## 🧪 Testing

```bash
# Run all tests
php artisan test

# Run specific test suite
php artisan test --filter=ProductTest

# Generate test coverage
php artisan test --coverage
```

## 📈 Performance Optimization

- **Redis Caching** - Session and data caching
- **Database Indexing** - Optimized queries
- **Asset Optimization** - Vite build optimization
- **Image Optimization** - Automatic image compression
- **Lazy Loading** - Efficient data loading

## 🔒 Security Features

- **CSRF Protection** - Cross-site request forgery prevention
- **SQL Injection Prevention** - Parameterized queries
- **XSS Protection** - Input sanitization
- **Rate Limiting** - API abuse prevention
- **Secure Authentication** - Laravel Fortify integration

## 🌐 API Documentation

The platform provides RESTful APIs for:
- **Product Management** - CRUD operations
- **Order Processing** - Order lifecycle management
- **User Management** - Authentication and profiles
- **Vendor Operations** - Vendor-specific endpoints

## 🤝 Contributing

1. Fork the repository
2. Create a feature branch (`git checkout -b feature/amazing-feature`)
3. Commit your changes (`git commit -m 'Add amazing feature'`)
4. Push to the branch (`git push origin feature/amazing-feature`)
5. Open a Pull Request

## 📝 License

This project is licensed under the MIT License - see the [LICENSE](LICENSE) file for details.

## 👨‍💻 Author

**Muhammad Elalfy**
- GitHub: [@muhammadelalfy](https://github.com/muhammadelalfy)
- Email: dev.muhamadelalfy@gmail.com
- LinkedIn: [dev-muhammad-elalfy](https://linkedin.com/in/dev-muhammad-elalfy)

## 🙏 Acknowledgments

- Built with [Laravel](https://laravel.com) framework
- Styled with [Tailwind CSS](https://tailwindcss.com)
- Real-time features powered by [Pusher](https://pusher.com)
- Development environment by [Laravel Sail](https://laravel.com/docs/sail)

---

⭐ **Star this repository if you find it helpful!**
