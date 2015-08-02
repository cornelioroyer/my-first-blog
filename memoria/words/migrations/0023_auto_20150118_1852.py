# -*- coding: utf-8 -*-
from __future__ import unicode_literals

from django.db import models, migrations
from django.utils.timezone import utc
import datetime


class Migration(migrations.Migration):

    dependencies = [
        ('words', '0022_auto_20150111_1330'),
    ]

    operations = [
        migrations.AddField(
            model_name='opciones',
            name='descripcion',
            field=models.CharField(db_index=True, max_length=300, null=True),
            preserve_default=True,
        ),
        migrations.AlterField(
            model_name='words',
            name='created',
            field=models.DateTimeField(null=True, verbose_name='fecha hora de creacion', default=datetime.datetime(2015, 1, 18, 23, 52, 20, 545823, tzinfo=utc)),
            preserve_default=True,
        ),
        migrations.AlterField(
            model_name='words',
            name='updated',
            field=models.DateTimeField(null=True, verbose_name='fecha hora update', default=datetime.datetime(2015, 1, 18, 23, 52, 20, 545823, tzinfo=utc)),
            preserve_default=True,
        ),
    ]
