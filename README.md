Yii2 debug xhprof panel
=======================
xhprof panel for Yii2 debug module

Installation
------------

The preferred way to install this extension is through [composer](http://getcomposer.org/download/).

Either run

```
php composer.phar require --prefer-dist trntv/yii2-debug-xhprof "*"
```

or add

```
"trntv/yii2-debug-xhprof": "*"
```

to the require section of your `composer.json` file.


Usage
-----

Once the extension is installed, simply use it in your code by  :

```php
<?= \trntv\debug\xhprof\AutoloadExample::widget(); ?>```