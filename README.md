# advanceCrud
This is our Last Project for the semester. A system for managing library.

## Installation
clone and run the script:
```bash
git clone https://github.com/faqihboyy/Prjoect-Web.git
chmod +x setup.sh
./setup.sh # run the script
```

## Todo
- [ ] Fix Some form
- [ ] Change theme to dark mode, (Nord theme)
- [ ] Improve UI
- [x] Create ChangeLog page

# Note
> [!IMPORTANT]
> Note for uploading Large File
by default, php (apache2 and php8.3-fpm) limit the size of upload file by 2MB, to increase the limit you can edit your `php.ini` files:
`php.ini`
```ini
upload_max_filesize = 100M
post_max_size = 100M
```
you can check this by the following command in linux shell:
```bash
~ 
 ❯ php -i | grep post_max_size
post_max_size => 12M => 12M

~ 
 ❯ php -i | grep upload_max_filesize
upload_max_filesize => 10M => 10M
```
To check which `php.ini` to edit, you can run:
```bash
~ 
 ❯ sudo find /etc/php/8.3/ -name php.ini # change with the php version you currently using
/etc/php/8.3/fpm/php.ini # output
/etc/php/8.3/cli/php.ini
/etc/php/8.3/apache2/php.ini
```
it is recomended to change or edit all of listed `php.ini` files.

## Cronjob
there are 1 cronjob available for generating a new hash file to be validated, can be triggered with: 
```bash
php artisan hash:validate
```
to start cronhjob automaticcaly every minute, run: 
```bash
php artisan schedule:run
```
there are one cronjob that run every minute to update hash running in `Console\Commands\ValidateHash.php`
cronjob can be checked with
```bash
$ crontab -l # example
* * * * * cd /path/to/your-laravel-project && php artisan schedule:run >> /dev/null 2>&1
```

## Donations 

<img height="100" src="https://res.coinpaper.com/coinpaper/f_webp,c_limit,w_3840,q_auto:good/monero_xmr_logo_d7cfda451e.png">

monero: 
```bash
8AaocxJgCRciXBg5zowkpfDT5uCM6cCcdSbBqwFH4bbja5G4J7SWfnnC6PyjFBUp3p3c19RkRNsAtiRUZ4FVjU9cAnheTNr
```

## Contributors
<a href="https://github.com/faqihboyy/Prjoect-Web/graphs/contributors">
  <img src="https://contrib.rocks/image?repo=faqihboyy/Prjoect-Web" />
</a>

