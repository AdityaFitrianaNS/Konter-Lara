## Instalation
### Prepare dependencies
```
- composer install
- copy .env.example and change to .env
```

### Change Database Config
```Change Database configuration in .env and .env.testing```
  
### Generate and Migration
```
- php artisan key:generate
- php artisan migrate --seed
```

### Prepare Front End
```
- npm install
- npm run dev
```

### Run Test and Development Server
```
- php artisan test
- php artisan serve
```
