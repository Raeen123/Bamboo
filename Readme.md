<center>
<img src="icon.ico" width="200">
</center>

<h1>Bamboo</h1>
Bamboo is a php api framework . Very easy , simple and light
<br><br>
<small>Made by Raeen Ahani in 2021 in Gorgan, Iran<small>
 <br><br>
 
[![Latest Stable Version](https://poser.pugx.org/raeen/bamboo/v)](//packagist.org/packages/raeen/bamboo)[![Total Downloads](https://poser.pugx.org/raeen/bamboo/downloads)](//packagist.org/packages/raeen/bamboo)[![Latest Unstable Version](https://poser.pugx.org/raeen/bamboo/v/unstable)](//packagist.org/packages/raeen/bamboo)[![License](https://poser.pugx.org/raeen/bamboo/license)](//packagist.org/packages/raeen/bamboo)[![Monthly Downloads](https://poser.pugx.org/raeen/bamboo/d/monthly)](//packagist.org/packages/raeen/bamboo)[![Daily Downloads](https://poser.pugx.org/raeen/bamboo/d/daily)](//packagist.org/packages/raeen/bamboo)[![composer.lock](https://poser.pugx.org/raeen/bamboo/composerlock)](//packagist.org/packages/raeen/bamboo)[![.gitattributes](https://poser.pugx.org/raeen/bamboo/gitattributes)](//packagist.org/packages/raeen/bamboo)[![Dependents](https://poser.pugx.org/raeen/bamboo/dependents)](//packagist.org/packages/raeen/bamboo)[![Suggesters](https://poser.pugx.org/raeen/bamboo/suggesters)](//packagist.org/packages/raeen/bamboo)

****
<br>

<h2>Install</h2>

<br>

```shell
composer create-project raeen/bamboo
```
<br>

<h2>Documentation</h2>

<br>

<h3>Database</h3>

To connect to the mysql database, refer to the ``.env``
<br><br>
<h3>Router</h3>

We use <a href="https://github.com/bramus/router">bramus/router</a> for the router, of course we customized it so that by default in the controller the function of the sent method is executed
<br><br>
<h3>Method</h3>

The method sent to the controllers is stored in the ``$method`` ( ``$this->method`` ) variable
<br><br>
<h3>Path</h3>

The page address is stored in the ``$path`` ( ``$this->path`` ) variable on the controllers
<br><br>
<h3>Data</h3>

The data sent to the api is stored in the controllers in the ``$data``  ( ``$this->data`` ) variable
<br><br>
<h3>File</h3>

The information of the files is stored in the ``$files`` ( ``$this->files`` ) variable in the controllers
<br><br>
The files are downloaded in the archive folder. To download, use the ``download(key of file , save File name = null)``function in the controllers.
<br><br>
Use the ``sendFile(file name)`` function on the controllers to send the file
<br><br>
<h3>Authenticate</h3>

For the http authorization header, use the ``auth(username, password)`` function in the controllers
<br><br>
<h3>Api Key</h3>

Use the ``apikey(length = 20)`` function in the controller to create the api key
<br><br>
<h3>Query</h3>

Use the  ``DB::query(sql query, parameters ...)``  function for SQL query on controllers. This function uses pdo
, example : 
```php
$query = DB::query("SELECT * FROM user WHERE name=?", $name);

$result = $query->fetch(PDO::FETCH_OBJ);
```
<br>
<h3>Render</h3>

Use  ``render(int $code, array | object $data = null, $status = null, $message = null)`` on the controllers to send the result as jason. Messages and statuses are completed by code by default
