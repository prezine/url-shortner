# url-shortner

Like the [cutt.ly](https://cutt.ly) and [bitly](https://bitly.com) these tool is built on PHP to help you shorten your URL, the good news is, it's fine if you don't want to store URL shortened in your Database, you can store it in a file and it'll work just fine.

## Getting Started
```bash
cd /var/www/html/
git clone https://github.com/prezine/url-shortner
cd url-shortner/
chmod -R 777 *
```

## Troubleshooting
If reading or writing file does not work, or stops working... It can only mean the permission of ```storage``` directory is no more ```0777```. to check open ```test.php``` file and change the value in the ```$filepath``` variable. to the directory path you wish to test permission for. then either you open your brower and navigate to the file ```http://127.0.0.1/url-shortner/test``` and run or open your terminal and run

```bash
cd /var/www/html/url-shortner
php test.php
```

If you get any output other than ```777``` then...

```bash
cd /var/www/html/url-shortner/
chmod -R 777 *
```

## Contributing
Pull requests are welcome. For major changes, please open an issue first to discuss what you would like to change.

## License
Of course [MIT](https://choosealicense.com/licenses/mit/)