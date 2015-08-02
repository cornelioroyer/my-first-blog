# -*- coding: utf-8 -*-
from __future__ import unicode_literals

from django.db import models, migrations
from django.utils.timezone import utc
import datetime


class Migration(migrations.Migration):

    dependencies = [
        ('words', '0027_auto_20150125_0920'),
    ]

    operations = [
        migrations.RemoveField(
            model_name='opciones',
            name='vote',
        ),
        migrations.AlterField(
            model_name='words',
            name='created',
            field=models.DateTimeField(null=True, verbose_name='fecha hora de creacion', default=datetime.datetime(2015, 1, 25, 17, 57, 32, 747827, tzinfo=utc)),
            preserve_default=True,
        ),
        migrations.AlterField(
            model_name='words',
            name='updated',
            field=models.DateTimeField(null=True, verbose_name='fecha hora update', default=datetime.datetime(2015, 1, 25, 17, 57, 32, 747827, tzinfo=utc)),
            preserve_default=True,
        ),
    ]
