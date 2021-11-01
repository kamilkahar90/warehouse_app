## Run Locally

### 1. Clone repo

```
$ git clone git@github.com/kamilkahar90/warehouse_app.git
$ cd test-laravelapp
```

### 2. Setup Environment

-   Download XAMPP/WAMP, Composer, Node.js

```
$ composer global require laravel/installer
$ cp .env.example .env
$ php artisan key:generate
```

### 3. Install Dependencies

```
$ composer install
$ npm install
$ npm run dev
$ npm run dev - (IMPORTANT: run second time to resolve the errorerrrrrrrrrrrrrrrrrrrrrrrrrrrr1====cgtf ........x )
```

### 4. Generate database

-   Create database name : warehouse_app

```
$ php artisan migrate
```

### 5. Run Project

```
$ php artisan serve
```
