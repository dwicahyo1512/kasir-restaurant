# Kasir Restaurant With Splade
## Screenshots

![App Screenshot](https://github.com/dwicahyo1512/kasir-restaurant/blob/daisy-ui/dokumen/Cover.png)
![App Screenshot1](https://github.com/dwicahyo1512/kasir-restaurant/blob/daisy-ui/dokumen/Cover-1.png)


## Installation

Install my-project

```bash
  git clone https://github.com/dwicahyo1512/kasir-restaurant.git

  cd Sistem-Tambang

  composer Install

  cp .env.example .env
```

Setting your database
    
 ```bash
DB_CONNECTION=mysql
DB_HOST=127.0.0.1
DB_PORT=3306
DB_DATABASE=(your database)
DB_USERNAME=root
DB_PASSWORD=
```

Migrate Database

```bash
php artisan migrate --seed
```

```bash
php artisan key:generate
```

run project
```bash
php artisan serve
```

