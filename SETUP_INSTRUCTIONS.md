# SETUP INSTRUCTIONS - CRUD Application

## Quick Start Guide

Follow these steps to run the CRUD Application:

### 1. Install Dependencies
```bash
composer install
```

### 2. Generate Application Key (if needed)
```bash
php artisan key:generate
```

### 3. Setup Database
The application is configured to use SQLite. The database file will be created automatically.

### 4. Run Migrations
```bash
php artisan migrate
```

### 5. Seed Sample Data (Optional but Recommended)
```bash
php artisan db:seed
```

This will add:
- 4 sample categories (Electronics, Accessories, Software, Books)
- 5 sample products with relationships

### 6. Start Development Server
```bash
php artisan serve
```

This will start the server at: **http://localhost:8000**

---

## Accessing the Application

### Main Routes:
- **Home**: http://localhost:8000
- **Products List**: http://localhost:8000/products
- **Categories List**: http://localhost:8000/admin/categories

### Products CRUD Operations:
- **View All Products**: GET /products
- **Create Product**: GET /products/create
- **Store Product**: POST /products
- **View Product**: GET /products/{id}
- **Edit Product**: GET /products/{id}/edit
- **Update Product**: PUT /products/{id}
- **Delete Product**: DELETE /products/{id}

### Categories CRUD Operations:
- **View All Categories**: GET /admin/categories
- **Create Category**: GET /admin/categories/create
- **Store Category**: POST /admin/categories
- **View Category**: GET /admin/categories/{id}
- **Edit Category**: GET /admin/categories/{id}/edit
- **Update Category**: PUT /admin/categories/{id}
- **Delete Category**: DELETE /admin/categories/{id}

---

## Database Structure

### Categories Table
```
- id (Primary Key)
- name (String, Unique)
- slug (String, Unique)
- description (Text, Nullable)
- timestamps (created_at, updated_at)
```

### Products Table
```
- id (Primary Key)
- name (String)
- description (Text, Nullable)
- price (Decimal 10,2)
- stock (Integer)
- category_id (Foreign Key → categories)
- sku (String, Unique)
- timestamps (created_at, updated_at)
```

---

## Form Validation Rules

### Product Validation:
- **Name**: Required, String, Max 255 characters
- **Price**: Required, Numeric, Minimum 0
- **Stock**: Required, Integer, Minimum 0
- **Category**: Required, Must exist in categories table
- **SKU**: Required, Unique (per product)

### Category Validation:
- **Name**: Required, String, Max 255 characters, Unique
- **Slug**: Required, String, Unique

---

## Key Features Implemented

✓ **MVC Architecture**
  - Well-organized Models, Views, Controllers
  
✓ **Database Configuration**
  - SQLite database for easy setup
  - Proper migrations and schema
  
✓ **Model Relationships**
  - Category hasMany Products
  - Product belongsTo Category
  
✓ **CRUD Operations**
  - Full Create, Read, Update, Delete functionality
  - RESTful routes and controllers
  
✓ **Form Validation**
  - Custom Form Request validation classes
  - Error message handling
  - Old data preservation on validation failure
  
✓ **Database Seeders**
  - Sample data for testing
  - Factories for data generation
  
✓ **User Interface**
  - Clean Blade templates
  - Tailwind CSS styling
  - Flash messages for feedback
  - Pagination support

---

## Troubleshooting

### Issue: "Database file not found"
**Solution**: The database.sqlite file is created automatically when you run migrations.

### Issue: "No categories found when creating product"
**Solution**: Run `php artisan db:seed` to populate the database with sample categories.

### Issue: "Migration errors"
**Solution**: Make sure you have the latest version of Laravel and all dependencies installed. Run `composer update`.

### Issue: Server won't start
**Solution**: Make sure no other service is running on port 8000. You can specify a different port:
```bash
php artisan serve --port=8001
```

---

## Test Data

After running seeders, you'll have:

**Categories:**
1. Electronics - electronic devices and gadgets
2. Accessories - accessories and tools
3. Software - software and applications
4. Books - books and educational materials

**Sample Products:**
1. Laptop Computer ($1,299.99) - 15 in stock - Electronics
2. Wireless Mouse ($29.99) - 50 in stock - Accessories
3. Mechanical Keyboard ($149.99) - 25 in stock - Accessories
4. 27" 4K Monitor ($599.99) - 10 in stock - Electronics
5. USB-C Hub ($79.99) - 30 in stock - Accessories

---

## Files Overview

### Controllers
- `app/Http/Controllers/ProductController.php` - Handles all product CRUD operations
- `app/Http/Controllers/CategoryController.php` - Handles all category CRUD operations

### Models
- `app/Models/Product.php` - Product model with category relationship
- `app/Models/Category.php` - Category model with products relationship

### Form Requests (Validation)
- `app/Http/Requests/StoreProductRequest.php` - Validates new products
- `app/Http/Requests/UpdateProductRequest.php` - Validates product updates
- `app/Http/Requests/StoreCategoryRequest.php` - Validates new categories
- `app/Http/Requests/UpdateCategoryRequest.php` - Validates category updates

### Migrations
- `database/migrations/2025_02_17_100000_create_categories_table.php`
- `database/migrations/2025_02_17_100001_create_products_table.php`

### Seeders
- `database/seeders/CategorySeeder.php`
- `database/seeders/ProductSeeder.php`
- `database/seeders/DatabaseSeeder.php`

### Views
- `resources/views/products/index.blade.php` - Products list
- `resources/views/products/create.blade.php` - Create product form
- `resources/views/products/show.blade.php` - Product details
- `resources/views/products/edit.blade.php` - Edit product form
- `resources/views/admin/categories/index.blade.php` - Categories list
- `resources/views/admin/categories/create.blade.php` - Create category form
- `resources/views/admin/categories/show.blade.php` - Category details with products
- `resources/views/admin/categories/edit.blade.php` - Edit category form

---

## License
This is a student project for learning Laravel CRUD operations.
