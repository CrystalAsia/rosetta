rosetta
=======

Starter Plugin with Twig Tools.

Right now it's just bare bones with no example methods. The goal would be to have a mini example plugin listing entries and showing off examples of the Craft button groups, drag and drop etc so it's easy to implement via copy paste.

The Twig Extensions will be seprated later, but right now there is convenience methods for print_r, var_dump and wrap available by:

### print_r

```{{ array|pr }}```

Same as PHP print_r.Will later check if xdebug is installed.

### var_dump

```{{ array|vd }}```

Same as PHP var_dump. Will later check if xdebug is installed.

### wrap

```{{ array|wrap }}```

Wrap each item in an array in a <span>. Will extend this to wrapping it in whatever you want.
