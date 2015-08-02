# -*- coding: utf-8 -*-
from __future__ import unicode_literals

from django.db import models, migrations
from django.utils.timezone import utc
import datetime


class Migration(migrations.Migration):

    dependencies = [
        ('words', '0026_auto_20150119_0737'),
    ]

    operations = [
        migrations.AlterField(
            model_name='opciones',
            name='words1',
            field=models.ForeignKey(to='words.Words', default=1),
            preserve_default=True,
        ),
        migrations.AlterField(
            model_name='words',
            name='created',
            field=models.DateTimeField(null=True, verbose_name='fecha hora de creacion', default=datetime.datetime(2015, 1, 25, 14, 20, 56, 430546, tzinfo=utc)),
            preserve_default=True,
        ),
        migrations.AlterField(
            model_name='words',
            name='updated',
            field=models.DateTimeField(null=True, verbose_name='fecha hora update', default=datetime.datetime(2015, 1, 25, 14, 20, 56, 430546, tzinfo=utc)),
            preserve_default=True,
        ),
    ]
