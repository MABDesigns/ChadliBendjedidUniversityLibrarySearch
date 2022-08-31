# Chadli Bendjedid University Library Search App

This repo represents a responsive web app for the Chadli Bendjedid University Library.

## Installation
First use this command to import the repo at your machine:

```bash
git clone https://github.com/MABDesigns/ChadliBendjedidUniversityLibrarySearch
```
Second, at /en/db/ you'll find a file named library.sql, import it at your database.

Third step, edit the index page of /en/search/ , and use your own credentials of your database.
```php
$conn = new PDO("mysql:host=localhost;dbname=dbname",'username','password',array(PDO::MYSQL_ATTR_INIT_COMMAND => "SET NAMES UTF8") /*for none latin characters*/);
$servername ="localhost";
$username = "username";
$password ="password";
$dbname ="database"; 
```
and that's it you can now start using the web app.

## Usage

At the Search bar type in the name of the book/article/publication that you want to check if it's available at the library.

## ScreenShot 

![Settings Window](https://i.postimg.cc/5jcXJ7Sc/Screenshot-2022-08-31-at-02-35-13-Search-In-Library.png)

## Contributing
Pull requests are welcome. For major changes, please open an issue first to discuss what you would like to change.

Please make sure to update tests as appropriate.

## License
[MIT](https://choosealicense.com/licenses/mit/)
