# -*- coding: utf-8 -*-
from __future__ import unicode_literals

from django.db import models, migrations
from django.utils.timezone import utc
import datetime


class Migration(migrations.Migration):

    dependencies = [
        ('words', '0030_auto_20150130_2224'),
    ]

    operations = [
        migrations.AddField(
            model_name='words',
            name='mistakes',
            field=models.IntegerField(default=0),
            preserve_default=True,
        ),
        migrations.AlterField(
            model_name='words',
            name='created',
            field=models.DateTimeField(null=True, verbose_name='fecha hora de creacion', default=datetime.datetime(2015, 2, 8, 13, 12, 36, 741360, tzinfo=utc)),
            preserve_default=True,
        ),
        migrations.AlterField(
            model_name='words',
            name='next_question',
            field=models.DateField(default=datetime.date(2015, 2, 8), db_index=True),
            preserve_default=True,
        ),
        migrations.AlterField(
            model_name='words',
            name='updated',
            field=models.DateTimeField(null=True, verbose_name='fecha hora update', default=datetime.datetime(2015, 2, 8, 13, 12, 36, 741360, tzinfo=utc)),
            preserve_default=True,
        ),
    ]
