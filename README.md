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
    Bantenprov\RasioGMSMK\RasioGMSMKServiceProvider::class,

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
          main: resolve => require(['./components/views/bantenprov/rasio-guru-murid-smk/DashboardRasioGMSMK.vue'], resolve),
          navbar: resolve => require(['./components/Navbar.vue'], resolve),
          sidebar: resolve => require(['./components/Sidebar.vue'], resolve)
        },
        meta: {
          title: "Rasio Guru-Murid (RGM) SMK"
        }
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
          main: resolve => require(['./components/bantenprov/rasio-guru-murid-smk/RasioGMSMKAdmin.show.vue'], resolve),
          navbar: resolve => require(['./components/Navbar.vue'], resolve),
          sidebar: resolve => require(['./components/Sidebar.vue'], resolve)
        },
        meta: {
          title: "Rasio Guru-Murid (RGM) SMK"
        }
      },
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

import RasioGMSMK from './components/bantenprov/rasio-guru-murid-smk/RasioGMSMK.chart.vue';
Vue.component('echarts-rasio-guru-murid-smk', RasioGMSMK);

import RasioGMSMKKota from './components/bantenprov/rasio-guru-murid-smk/RasioGMSMKKota.chart.vue';
Vue.component('echarts-rasio-guru-murid-smk-kota', RasioGMSMKKota);

import RasioGMSMKTahun from './components/bantenprov/rasio-guru-murid-smk/RasioGMSMKTahun.chart.vue';
Vue.component('echarts-rasio-guru-murid-smk-tahun', RasioGMSMKTahun);

import RasioGMSMKAdminShow from './components/bantenprov/rasio-guru-murid-smk/RasioGMSMKAdmin.show.vue';
Vue.component('admin-view-rasio-guru-murid-smk-tahun', RasioGMSMKAdminShow);

//== Echarts Rasio Guru Murid SMK

import RasioGMSMKBar01 from './components/views/bantenprov/rasio-guru-murid-smk/RasioGMSMKBar01.vue';
Vue.component('rasio-guru-murid-smk-bar-01', RasioGMSMKBar01);

import RasioGMSMKBar02 from './components/views/bantenprov/rasio-guru-murid-smk/RasioGMSMKBar02.vue';
Vue.component('rasio-guru-murid-smk-bar-02', RasioGMSMKBar02);

//== mini bar charts
import RasioGMSMKBar03 from './components/views/bantenprov/rasio-guru-murid-smk/RasioGMSMKBar03.vue';
Vue.component('rasio-guru-murid-smk-bar-03', RasioGMSMKBar03);

import RasioGMSMKPie01 from './components/views/bantenprov/rasio-guru-murid-smk/RasioGMSMKPie01.vue';
Vue.component('rasio-guru-murid-smk-pie-01', RasioGMSMKPie01);

import RasioGMSMKPie02 from './components/views/bantenprov/rasio-guru-murid-smk/RasioGMSMKPie02.vue';
Vue.component('rasio-guru-murid-smk-pie-02', RasioGMSMKPie02);

//== mini pie charts
import RasioGMSMKPie03 from './components/views/bantenprov/rasio-guru-murid-smk/RasioGMSMKPie03.vue';
Vue.component('rasio-guru-murid-smk-pie-03', RasioGMSMKPie03);
```
