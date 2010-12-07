<?php

Registry::set('config.defaultCanvas', 'default');
Registry::set('config.defaultTemplate', 'frontpage');
Registry::set('config.defaultController', 'content');
Registry::set('config.indexController', 'home');
Registry::set('config.404Canvas', '404');
Registry::set('config.siteName', 'Base');
Registry::set('config.pageTitle', Registry::get('config.siteName') . ' - %s');