## Sendex_ai

### Requirements
- `Docker`
-  `Docker Compose`

#### Setup the Project
1. Clone the repo and run `cp .env.example .env`
2. Run this command to download composer dependencies:
   <br>
   ``` bash
   docker run --rm \
    -v $(pwd):/opt \
    -w /opt \
    laravelsail/php83-composer:latest \
    composer install
   ```
3. Make sure no process is running on 8000,8001,8002 port and Run the command to run the containers<br>`./vendor/bin/sail up`
4. Run command to set application key `sail artisan key:generate`
5. Run command to migrate the database `sail artisan migrate`
6. Run command to run the app `sail up`


### Demo
https://github.com/pushpak1300/sendex_ai/assets/31663512/da56c70c-a324-44ee-8ed8-9d3078dc9faa
