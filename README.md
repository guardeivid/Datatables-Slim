# Datatables for Laravel

[![Software License][ico-license]](LICENSE.md)

A package for Laravel that integrates Eloquent queries and Illuminate Collections into [Datatables for JQuery](https://datatables.net/).

## Structure

```
src/
```


## Install

Via Composer

``` bash
$ composer require guardeivid/datatables-slim "dev-master"
```

## Usage

``` php
// Laravel:
namespace App\Http\Controllers;
use  Gealtec\Datatables\Datatables;

class Controller extends BaseController
{
    public function datatablesExample (Request $request)
    {
        $users = Users::query();
        return Datatables::response($users, $request);
    }
}
```

``` javascript
// Datatables:
$('#example').DataTable( {
    "serverSide": true,
    "processing": true,
    "ajax": "datatablesexample",
    columns : [
        // The "name" property in the column initialization for Model attributes are optional.

        // This works...
        { "data": "id", "title": "Id" },

        // And so does this...
        { "data": "name", "title": "Name", "name": "name" },
        { "data": "email", "title": "Number", "name": "email" },

        // The "name" properties in your Datatables column initialization
        // will eager load the relations of the Model you are querying against 
        // when you use Laravel dot notation...
        { "data": "groups[].name", "title": "Groups", "name": "groups.*.name" },

        // The "data" properties in the column initialization represent the displayed data
        // which is accessible using standard JavaScript bracket notation...
        { "data": "groups[].roles[].title", "title": "Roles", "name": "groups.*.roles.*.title" }
    ]
} );
```

## Change log

Please see [CHANGELOG](CHANGELOG.md) for more information on what has changed recently.

## Contributing

Please see [CONTRIBUTING](CONTRIBUTING.md) and [CONDUCT](CONDUCT.md) for details.

## Security

If you discover any security related issues, please email john.markese@gmail.com instead of using the issue tracker.

## Credits

- [John Markese][link-author]
- [Alonso Alejandro Zúñiga Beltrán][link-editor]
- [All Contributors][link-contributors]

## License

The MIT License (MIT). Please see [License File](LICENSE.md) for more information.

[ico-version]: https://img.shields.io/packagist/v/jmarkese/datatables.svg?style=flat-square
[ico-license]: https://img.shields.io/badge/license-MIT-brightgreen.svg?style=flat-square
[ico-travis]: https://img.shields.io/travis/jmarkese/datatables/master.svg?style=flat-square
[ico-scrutinizer]: https://img.shields.io/scrutinizer/coverage/g/jmarkese/datatables.svg?style=flat-square
[ico-code-quality]: https://img.shields.io/scrutinizer/g/jmarkese/datatables.svg?style=flat-square
[ico-downloads]: https://img.shields.io/packagist/dt/jmarkese/datatables.svg?style=flat-square

[link-packagist]: https://packagist.org/packages/jmarkese/datatables
[link-travis]: https://travis-ci.org/jmarkese/datatables
[link-scrutinizer]: https://scrutinizer-ci.com/g/jmarkese/datatables/code-structure
[link-code-quality]: https://scrutinizer-ci.com/g/jmarkese/datatables
[link-downloads]: https://packagist.org/packages/jmarkese/datatables
[link-author]: https://github.com/jmarkese
[link-editor]: https://github.com/aazbeltran
[link-contributors]: ../../contributors
