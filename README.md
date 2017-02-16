#laravelmpdf

#Installation:

composer require mediaciety/laravelmpdf

Open *config/app.php* and add 
```
    Mediaciety\LaravelMpdf\PdfServiceProvider::class 
```
to providers array.
Add 
```
'Pdf' => Mediaciety\LaravelMpdf\Facades\Pdf::class to alias-array.
```
finally (and optional): 
```
php artisan vendor:publish --tag=pdf to copy configfile into config folder.
```
