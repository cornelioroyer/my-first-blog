# -*- coding: utf-8 -*-
from __future__ import unicode_literals

from django.db import models, migrations
from django.utils.timezone import utc
import datetime


class Migration(migrations.Migration):

    dependencies = [
        ('words', '0023_auto_20150118_1852'),
    ]

    operations = [
        migrations.AlterField(
            model_name='words',
            name='created',
            field=models.DateTimeField(null=True, default=datetime.datetime(2015, 1, 18, 23, 52, 31, 284437, tzinfo=utc), verbose_name='fecha hora de creacion'),
            preserve_default=True,
        ),
        migrations.AlterField(
            model_name='words',
            name='updated',
            field=models.DateTimeField(null=True, default=datetime.datetime(2015, 1, 18, 23, 52, 31, 284437, tzinfo=utc), verbose_name='fecha hora update'),
            preserve_default=True,
        ),
    ]
