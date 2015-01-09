# Date tools plugin for Grav CMS

This Grav CMS plugin provides date tools to use inside of Twig for filtering pages. With the release of Grav 0.9.13 `startDate` and `endDate` were introduced to collection parsing. You can use the following date tools to set various dates you would like your collection to fall between. 

## Configuration

Set up your preferred date formats in datetools.yaml

The default is set to the American date format of 01/01/2015 12:00am.

```
dateFormat: 
    default: "m/d/Y g:ia"
    long: "l, F j, g:ia"
    medium: "F j, g:ia"
    short: "m/d/y"
```

## Example Use

```
{% set pages = page.collection({'items':{'@taxonomy.category':'News'},'dateRange':{datetools.startOfMonth, datetools.endOfMonth},'order':{'by':'date','dir':'asc'}}) %}

<ul>
{% foreach pages as page %}
    <li>{{ page.title }}</li>
{% endfor %}
</ul>
```

## Common dates and times available

```
datetools.today
datetools.yesterday
datetools.tomorrow
datetools.startOfWeek
datetools.endOfWeek
datetools.startOfMonth
datetools.endOfMonth
datetools.startOfYear
datetools.endOfYear
```

## Methods available

```
datetools.parseDate('today')
```