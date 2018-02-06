# rasio-guru-murid-smk
Rasio Guru-Murid (RGM) SMK Menurut Kabupaten/Kota

[![Join the chat at https://gitter.im/rasio-guru-murid-smk/Lobby](https://badges.gitter.im/rasio-guru-murid-smk/Lobby.svg)](https://gitter.im/rasio-guru-murid-smk/Lobby?utm_source=badge&utm_medium=badge&utm_campaign=pr-badge&utm_content=badge)
[![Scrutinizer Code Quality](https://scrutinizer-ci.com/g/bantenprov/rasio-guru-murid-smk/badges/quality-score.png?b=master)](https://scrutinizer-ci.com/g/bantenprov/rasio-guru-murid-smk/?branch=master)
[![Build Status](https://scrutinizer-ci.com/g/bantenprov/rasio-guru-murid-smk/badges/build.png?b=master)](https://scrutinizer-ci.com/g/bantenprov/rasio-guru-murid-smk/build-status/master)

Rasio Guru-Murid (RGM) SMK

## install via composer

- Development snapshot
```bash
$ composer require bantenprov/rasio-guru-murid-smk:dev-master
```
- Latest release:

```bash
$ composer require bantenprov/rasio-guru-murid-smk:v0.1.0
```

## download via github
~~~
bash
$ git clone https://github.com/bantenprov/rasio-guru-murid-smk.git
~~~


#### Edit `config/app.php` :
```php

'providers' => [

    /*
    * Laravel Framework Service Providers...
    */
    Illuminate\Auth\AuthServiceProvider::class,
    Illuminate\Broadcasting\BroadcastServiceProvider::class,
    Illuminate\Bus\BusServiceProvider::class,
    Illuminate\Cache\CacheServiceProvider::class,
    Illuminate\Foundation\Providers\ConsoleSupportServiceProvider::class,
    Illuminate\Cookie\CookieServiceProvider::class,
    //....
    Bantenprov\RasioGMSmk\RasioGMSmkServiceProvider::class,

```

#### Untuk publish component vue :

```bash
$ php artisan vendor:publish --tag=rasio-guru-murid-smk-assets
$ php artisan vendor:publish --tag=rasio-guru-murid-smk-public
```
#### Tambahkan route di dalam route : `resources/assets/js/routes.js` :

```javascript
path: '/dashboard',
component: layout('Default'),
children: [
  {
    path: '/dashboard',
    components: {
      main: resolve => require(['./components/views/DashboardHome.vue'], resolve),
      navbar: resolve => require(['./components/Navbar.vue'], resolve),
      sidebar: resolve => require(['./components/Sidebar.vue'], resolve)
    },
    meta: {
      title: "Dashboard"
    }
  },
  //== ...
  {
    path: '/dashboard/rasio-guru-murid-smk',
    components: {
      main: resolve => require(['./components/views/bantenprov/rasio-guru-murid-smk/DashboardRasioGMSmk.vue'], resolve),
      navbar: resolve => require(['./components/Navbar.vue'], resolve),
      sidebar: resolve => require(['./components/Sidebar.vue'], resolve)
    },
    meta: {
      title: "Rasio Guru-Murid (RGM) SMK"
    }
  }
```

```javascript
{
path: '/admin',
redirect: '/admin/dashboard',
component: resolve => require(['./AdminLayout.vue'], resolve),
children: [
//== ...
    {
      path: '/admin/dashboard/rasio-guru-murid-smk',
      components: {
        main: resolve => require(['./components/bantenprov/rasio-guru-murid-smk/RasioGMSmkAdmin.show.vue'], resolve),
        navbar: resolve => require(['./components/Navbar.vue'], resolve),
        sidebar: resolve => require(['./components/Sidebar.vue'], resolve)
      },
      meta: {
        title: "Rasio Guru-Murid (RGM) SMK"
      }
    }
 //== ...   
  ]
},

```
#### Edit menu `resources/assets/js/menu.js`

```javascript
{
  name: 'Dashboard',
  icon: 'fa fa-dashboard',
  childType: 'collapse',
  childItem: [
        {
          name: 'Dashboard',
          link: '/dashboard',
          icon: 'fa fa-angle-double-right'
        },
        {
          name: 'Entity',
          link: '/dashboard/entity',
          icon: 'fa fa-angle-double-right'
        },
        //== ...
        {
          name: 'Rasio Guru-Murid (RGM) SMK',
          link: '/dashboard/rasio-guru-murid-smk',
          icon: 'fa fa-angle-double-right'
        }
  ]
},

```

#### Tambahkan components `resources/assets/js/components.js` :

```javascript

import RasioGMSmk from './components/bantenprov/rasio-guru-murid-smk/RasioGMSmk.chart.vue';
Vue.component('echarts-rasio-guru-murid-smk', RasioGMSmk);

import RasioGMSmkKota from './components/bantenprov/rasio-guru-murid-smk/RasioGMSmkKota.chart.vue';
Vue.component('echarts-rasio-guru-murid-smk-kota', RasioGMSmkKota);

import RasioGMSmkTahun from './components/bantenprov/rasio-guru-murid-smk/RasioGMSmkTahun.chart.vue';
Vue.component('echarts-rasio-guru-murid-smk-tahun', RasioGMSmkTahun);

import RasioGMSmkAdminShow from './components/bantenprov/rasio-guru-murid-smk/RasioGMSmkAdmin.show.vue';
Vue.component('admin-view-rasio-guru-murid-smk-tahun', RasioGMSmkAdminShow);

//== Echarts Angka Partisipasi Kasar

import RasioGMSmkBar01 from './components/views/bantenprov/rasio-guru-murid-smk/RasioGMSmkBar01.vue';
Vue.component('rasio-guru-murid-smk-bar-01', RasioGMSmkBar01);

import RasioGMSmkBar02 from './components/views/bantenprov/rasio-guru-murid-smk/RasioGMSmkBar02.vue';
Vue.component('rasio-guru-murid-smk-bar-02', RasioGMSmkBar02);

//== mini bar charts
import RasioGMSmkBar03 from './components/views/bantenprov/rasio-guru-murid-smk/RasioGMSmkBar03.vue';
Vue.component('rasio-guru-murid-smk-bar-03', RasioGMSmkBar03);

import RasioGMSmkPie01 from './components/views/bantenprov/rasio-guru-murid-smk/RasioGMSmkPie01.vue';
Vue.component('rasio-guru-murid-smk-pie-01', RasioGMSmkPie01);

import RasioGMSmkPie02 from './components/views/bantenprov/rasio-guru-murid-smk/RasioGMSmkPie02.vue';
Vue.component('rasio-guru-murid-smk-pie-02', RasioGMSmkPie02);

//== mini pie charts
import RasioGMSmkPie03 from './components/views/bantenprov/rasio-guru-murid-smk/RasioGMSmkPie03.vue';
Vue.component('rasio-guru-murid-smk-pie-03', RasioGMSmkPie03);
```
