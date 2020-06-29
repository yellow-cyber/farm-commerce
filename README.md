## About Farmerce

Founded in June 2020 and based in Tacloban City, Leyte, Philippines, Farmerce is a trusted
community marketplace for people to list, discover, and buy unique farming supplies in the region.
Whether an egg or a carabao, Farmerce offers farming supplies at the best prices and the highest quality. Farmerce is the easiest way for farmers to monetize their supplies and showcase it to an audience of millions.

## Usage

1. Unzip the file
2. Modify .env depending on your database configuration
3. run php artisan migrate:fresh --seed
4. php artisan serve
5. You can also view the app at http://farm-commerce.herokuapp.com. Note that it might take up several minutes for the app to load since it is hosted on a free server.

## Administrator

Development

1. Create an account
2. Run php artisan tinker
3. \$u = App\User::find(1)
4. \$u->profile->role = 1
5. \$u->profile->save()
6. exit

Production

1. Go to /admin
2. Login with
   user: admin@gmail.com
   psd: admin123

## Bugs and errors

If you encounter any errors:

1. npm install
2. npm run dev
3. composer install
4. you can also contact ryanbuenaventura321@gmail.com - 09668336496

## Members

1. Ryan Tillaman
2. Kirby Llano
3. Clark Ramones
