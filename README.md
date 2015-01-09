# Date tools plugin for Grav CMS

This Grav CMS plugin provides date tools to use inside of Twig for filtering pages.

## Configuration

Set up date formats in datetools.yaml
```
dateFormat: 
    default: m/d/Y g:ia
    long: 
    medium: 
    short: 
```

## Example Use

```
{% set sundayEvents = page.collection({'items':{'@taxonomy.event_repeat':'U'}, 'order':{'by':'date','dir':'asc'}}) %}
```

## Methods available

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

datetools.parseDate('today')

```
