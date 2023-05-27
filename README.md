# FoodE Web

This is the web version of my "FoodE" app. This has all the features of the Android App with some additional features like,

- People can Update or modify Additive details
- This app provides a user friendly REST API

<p align="center">
<img src="https://github.com/SuhasDissa/Food-E-Web/assets/64766434/63db7598-a749-454d-9426-c288ff47c14e" width="80%">
<br/>
<img src="https://github.com/SuhasDissa/Food-E-Web/assets/64766434/0e20b23f-4253-4833-a53c-20eb32149100" width="80%">
<br/>
<img src="https://github.com/SuhasDissa/Food-E-Web/assets/64766434/46452c75-0466-45a7-8c3d-a20d3417553a" width="50%">
<br/>
</p>
## Quick start guide

I recommend you to run this on github codespaces
Fork this repo and open it in github codespaces

### Quick Installation

Run the following commands
```bash
git clone https://github.com/SuhasDissa/Food-E-Web.git
cd Food-E-Web
chmod +x setup.sh
./setup.sh
```

### Manual Installation

#### Step 1
Clone this repository to your system

```bash
git clone https://github.com/SuhasDissa/Food-E-Web.git
cd Food-E-Web
```
#### Step 2
Build the project
```bash
docker-compose build app
docker-compose up -d
```

#### Step 3
Create a file named `.env` with the following content
```env
APP_NAME=Food-E
APP_KEY=
DB_CONNECTION=sqlite

```

#### Step 4
Install dependencies
```bash
docker exec food_e composer install --optimize-autoloader --no-dev
docker exec food_e npm install
docker exec food_e npm run build

docker exec food_e php artisan key:generate
docker exec food_e php artisan config:cache
docker exec food_e php artisan route:cache
docker exec food_e php artisan view:cache
docker exec food_e php artisan migrate
```
Now you can access this app from `http://localhost:80`
