Yii2 debug xhprof panel
=======================
xhprof panel for Yii2 debug module

IMPORTANT
---------
This is an early prototype, it is working, but pretty ugly. Contribute to it, to make it more pretty and awesome.

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

add panel to your debug module configuration
```
'modules'=>[
    ...
    'debug'=>[
        ...
        'panels'=>[
            ...
            'xhprof'=>[
                'class'=>'\trntv\debug\xhprof\panels\XhprofPanel'
            ]
        ]
    ]
    ...
]
```

Usage
-----
soon ;)