# Live Stock Backend – Developer README

## Overview
This project simulates a backend system where users can purchase products, enter their details, and have the order stored in a database.  
The system uses **PHP**, **MySQL**, and **Bootstrap** for validation and UI.

---

## Project Structure

```
BACKEND-STOCK-SYSTEM/
│
├── live-stock-backend/
│   ├── diagrams/
│   │   ├── dynamicstock.sql
│   │   ├── dynamicstockERD.pdf
│   │   ├── dynamicstockFlowchart.pdf
│   │   ├── Live Backend Stock System – ...
│   │   ├── Live Stock Backend Detailed ...
│   │
│   ├── testing/
│   │   ├── Live Backend Stock System Te...
│
├── db.php
├── index.php
├── order_handling.php
├── style.css
├── README.md
```

---

## Backend Logic

### **db.php**
- Handles database connection  
- Contains functions for:  
  - Fetching products  
  - Fetching product ID by name  
  - Inserting new orders  
- All queries use prepared statements  

### **order_handling.php**
- Validates incoming form data  
- Retrieves product ID  
- Inserts order into database  
- Redirects to thank‑you page  
- Shows Bootstrap success alert  

### **index.php**
- Displays product list  
- Contains checkout form  
- Uses Bootstrap validation  

---

## Security
- All SQL queries use prepared statements  
- No sensitive data stored unhashed  
- No user accounts so no password hashing required  

---

## Setup Instructions
1. Read the diagrams/Live Backend Stock System - User Guide.pdf (Has screenshots and explains each file/function)
2. Import **dynamicstock.sql** into phpMyAdmin  
3. Update database credentials in **db.php**  
4. Place project in your local server directory (XAMPP/MAMP)  
5. Visit:  
   ```
   http://localhost/testing/index.php
   ```

---

### ⚠️ Disclaimer
**No Payment Function is in this as it is an example this can be added using third party softwares such as paypal etc.**
**All current default data are NOT mine and are placeholders used only for demonstration purposes.**
