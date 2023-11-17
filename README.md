# Laravel React Example Full Stack Application
Example Application build with Laravel and React

> The repo was created while I was working on the following [YouTube tutorial](https://youtu.be/qJq9ZMB2Was)

## Demo
https://laravel-react.com


## Installation 
Make sure you have environment setup properly. You will need PHP8.1, composer and Node.js.

1. Download the project (or clone using GIT)
2. Copy `.env.example` into `.env` and configure database credentials
3. Navigate to the project's root directory using terminal
4. Run `composer install`
5. Set the encryption key by executing `php artisan key:generate --ansi`
6. Run migrations `php artisan migrate --seed`
7. Start local server by executing `php artisan serve`
8. Open new terminal and navigate to the `react` folder
9. Copy `react/.env.example` into `.env` and adjust the `VITE_API_BASE_URL` parameter
9. Run `npm install`
10. Run `npm run dev` to start vite server for React




##TODO
1. Folder react is used to test API, will be deleted in the final.
2. Migrate database
    - User: ID, username, email, password, name, role
    - Product: ID, name, unit_price
    - Customer: ID, name, phone_number
    - Voucher: ID, voucher_code, type, amount, start_date, end_date, quantity
    - Invoice: ID, user_id, customer_id, voucher_id (nullable), price, discount_price, final_price, note (nullable), date
    - Invoice_detail: invoice_id, product_id, quantity
    - 
3. API
   + Staff
       - List Products: [GET] /staff/products
       - Checkout Invoice: [POST] /staff/invoices
       - Verify Voucher: [POST] /staff/verify-voucher
       - List Invoice: [GET] /staff/invoices (pending invoices which has not been served)
       - Add Member: [POST] /staff/members
   + Admin
       - List, Add, Update, Delete Products: [GET, POST, PATCH, DELETE] /admin/products (Quản lý products)
       - List members: [GET] /admin/members
       - List, Add, Update, Delete Vouchers: [GET, POST, PATCH, DELETE] /admin/vouchers (Quản lý vouchers)
       - List Invoice: [GET] /admin/invoices
       - View detail: [GET] /admin/invoices/{id}
       - List, Add, Update, Delete User: [GET, POST, PATCH, DELETE] /admin/users (Quản lý nhân viên, user)
5. Docs API
