# Product Management CRUD Application

## Overview
This is a complete Laravel CRUD application implementing the MVC (Model-View-Controller) architecture with proper database management, migrations, and form validation.

## Features Implemented

### 1. **MVC Architecture**
- **Models**: `Product` and `Category` with relationships
- **Views**: Complete Blade templates for all CRUD operations
- **Controllers**: RESTful controllers with database operations

### 2. **Database Configuration**
- **Database**: SQLite (configured in `.env`)
- **Connection**: Uses Laravel's Eloquent ORM
- **Migrations**: Proper schema definition with constraints

### 3. **Migrations**
- `create_categories_table.php`: Categories table with id, name, description, slug
- `create_products_table.php`: Products table with id, name, description, price, stock, category_id, sku

### 4. **Models**
- **Category Model** (`app/Models/Category.php`)
  - Has many products relationship
  - Mass assignable fields: name, description, slug

- **Product Model** (`app/Models/Product.php`)
  - Belongs to category relationship
  - Mass assignable fields: name, description, price, stock, category_id, sku

### 5. **Form Validation**
- **StoreProductRequest**: Validates new product creation
- **UpdateProductRequest**: Validates product updates (unique SKU constraint)
- **StoreCategoryRequest**: Validates new category creation
- **UpdateCategoryRequest**: Validates category updates

### 6. **CRUD Operations**

#### Products
- **Index**: View all products with pagination
- **Create**: Form to create new product
- **Show**: View detailed product information
- **Edit**: Modify product details
- **Delete**: Remove product from database

#### Categories
- **Index**: View all categories with product count
- **Create**: Form to create new category
- **Show**: View category details with associated products
- **Edit**: Modify category information
- **Delete**: Remove category (with validation to prevent deletion if products exist)

### 7. **Data Passing**
- Controllers pass data to views using `view()` helper
- Session flash messages for success/error notifications
- Form old data preserved on validation errors using `old()` helper

### 8. **Database Seeders**
- **CategorySeeder**: Seeds 4 sample categories
- **ProductSeeder**: Seeds 5 sample products with relationships
- **DatabaseSeeder**: Orchestrates all seeders

## Installation & Setup

### Requirements
- PHP 8.1 or higher
- Composer
- SQLite (included, no additional setup needed)

### Steps

1. **Extract and navigate to project directory**
   ```bash
   cd sia-2-activities
   ```

2. **Install dependencies**
   ```bash
   composer install
   ```

3. **Setup environment file**
   - Copy `.env` file (already included)
   - Generate APP_KEY if not present:
     ```bash
     php artisan key:generate
     ```

4. **Create database and run migrations**
   ```bash
   php artisan migrate
   ```

5. **Seed the database with sample data**
   ```bash
   php artisan db:seed
   ```

6. **Start the development server**
   ```bash
   php artisan serve
   ```

7. **Access the application**
   - Open browser and go to: `http://localhost:8000`
   - Products: `http://localhost:8000/products`
   - Categories: `http://localhost:8000/admin/categories`

## Project Structure

```
app/
├── Http/
│   ├── Controllers/
│   │   ├── ProductController.php
│   │   └── CategoryController.php
│   └── Requests/
│       ├── StoreProductRequest.php
│       ├── UpdateProductRequest.php
│       ├── StoreCategoryRequest.php
│       └── UpdateCategoryRequest.php
└── Models/
    ├── Product.php
    └── Category.php

database/
├── migrations/
│   ├── create_categories_table.php
│   └── create_products_table.php
├── factories/
│   ├── CategoryFactory.php
│   └── ProductFactory.php
└── seeders/
    ├── CategorySeeder.php
    ├── ProductSeeder.php
    └── DatabaseSeeder.php

resources/
└── views/
    ├── products/
    │   ├── index.blade.php
    │   ├── create.blade.php
    │   ├── show.blade.php
    │   └── edit.blade.php
    └── admin/categories/
        ├── index.blade.php
        ├── create.blade.php
        ├── show.blade.php
        └── edit.blade.php

routes/
└── web.php
```

## Key Features

### Validation Rules

**Products:**
- Name: Required, string, max 255 chars
- Price: Required, numeric, min 0
- Stock: Required, integer, min 0
- Category: Required, must exist in categories table
- SKU: Required, unique per product

**Categories:**
- Name: Required, string, max 255 chars, unique
- Slug: Required, string, unique

### Relationships
- One Category has many Products
- One Product belongs to one Category
- Cascade delete: Deleting a category can delete its products

### Error Handling
- Form validation errors displayed with custom messages
- Flash messages for successful operations
- Confirmation dialogs for destructive operations

## Testing the Application

### Sample Data
The seeder includes:
- Electronics, Accessories, Software, Books categories
- 5 sample products with various details

### Workflow
1. Navigate to Products → View all products
2. Click "Add Product" to create new product
3. Select a category from dropdown
4. Fill in product details (name, price, stock, SKU)
5. Click "Create Product"
6. View product details by clicking "View"
7. Edit product by clicking "Edit"
8. Delete product using "Delete" button

## Database Schema

### Categories Table
```sql
id (primary key)
name (unique)
description (nullable)
slug (unique)
timestamps
```

### Products Table
```sql
id (primary key)
name
description (nullable)
price (decimal 10,2)
stock (integer)
category_id (foreign key)
sku (unique)
timestamps
```

## Notes
- The application uses SQLite for database storage
- Database file is located at: `database/database.sqlite`
- All CRUD operations are fully functional with database integration
- Form validation prevents invalid data entry
- Relationships are properly established (One-to-Many)

## Author
Individual Activity Submission
