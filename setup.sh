#!/bin/bash

cat << EOF
                                                             .~)>>
                                                           .~))))>>>
                                                         .~))>>             ___
                                                       .~))>>)))>>      .-~))>>
                                                     .~)))))>>       .-~))>>)>
                                                   .~)))>>))))>>  .-~)>>)>
                               )                 .~))>>))))>>  .-~)))))>>)>
                            ( )@@*)             //)>))))))  .-~))))>>)>
                          ).@(@@               //))>>))) .-~))>>)))))>>)>
                        (( @.@).              //))))) .-~)>>)))))>>)>
                      ))  )@@*.@@ )          //)>))) //))))))>>))))>>)>
                   ((  ((@@@.@@             |/))))) //)))))>>)))>>)>
                  )) @@*. )@@ )   (\_(\-\b  |))>)) //)))>>)))))))>>)>
                (( @@@(.@(@ .    _/`-`  ~|b |>))) //)>>)))))))>>)>
                 )* @@@ )@*     (@)  (@) /\b|))) //))))))>>))))>>
               (( @. )@( @ .   _/  /    /  \b)) //))>>)))))>>>_._
                )@@ (@@*)@@.  (6///6)- / ^  \b)//))))))>>)))>>   ~~-.
             ( @jgs@@. @@@.*@_ VvvvvV//  ^  \b/)>>))))>>      _.     `bb
              ((@@ @@@*.(@@ . - | o |' \ (  ^   \b)))>>        .'       b`,
               ((@@).*@@ )@ )   \^^^/  ((   ^  ~)_        \  /           b `,
                 (@@. (@@ ).     `-'   (((   ^    `\ \ \ \ \|             b  `.
                   (*.@*              / ((((        \| | |  \       .       b `.
                                     / / (((((  \    \ /  _.-~\     Y,      b  ;
                                    / / / (((((( \    \.-~   _.`" _.-~`,    b  ;
                                   /   /   `(((((()    )    (((((~      `,  b  ;
                                 _/  _/      `"""/   /'                  ; b   ;
                             _.-~_.-~           /  /'                _.'~bb _.'
                           ((((~~              / /'              _.'~bb.--~
                                              ((((          __.-~bb.-~
                                                          .'  b .~~
                                                          :bb ,'
                                                          ~~~~

                https://github.com/faqihboyy/Prjoect-Web
                https://github.com/fauzymadani/Project-Web

EOF


if ! command -v composer &> /dev/null || ! command -v php &> /dev/null; then
    echo "No composer nor PHP was found. Please install them first."
    exit 1
fi

if [ ! -f .env.example ]; then
    echo ".env.example file not found!"
    exit 1
fi

cp .env.example .env

# Install dependencies
composer update || { echo "Composer update failed!"; exit 1; }
composer install || { echo "Composer install failed!"; exit 1; }

php artisan key:generate || { echo "Failed to generate app key!"; exit 1; }

php artisan migrate || { echo "Migration failed!"; exit 1; }
php artisan db:seed || { echo "Seeding failed!"; exit 1; }
php artisan db:seed --class=UserTableSeeder || { echo "UserTableSeeder failed!"; exit 1; }
php artisan db:seed --class=BookSeeder || { echo "BookSeeder failed!"; exit 1; }
php artisan db:seed --class=DatabaseSeeder || { echo "DatabaseSeeder failed!"; exit 1; }

echo "======================== Thank you for cloning this project! =============================="

