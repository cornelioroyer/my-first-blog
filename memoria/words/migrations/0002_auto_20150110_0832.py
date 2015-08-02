# -*- coding: utf-8 -*-
from __future__ import unicode_literals

from django.db import models, migrations
import datetime


class Migration(migrations.Migration):

    dependencies = [
        ('words', '0001_initial'),
    ]

    operations = [
        migrations.AlterField(
            model_name='words',
            name='dt_created',
            field=models.DateTimeField(default=datetime.datetime(2015, 1, 10, 8, 32, 1, 326189), verbose_name='fecha hora de creacion', null=True),
            preserve_default=True,
        ),
        migrations.AlterField(
            model_name='words',
            name='dt_updated',
            field=models.DateTimeField(default=datetime.datetime(2015, 1, 10, 8, 32, 1, 326189), verbose_name='fecha hora update', null=True),
            preserve_default=True,
        ),
    ]
