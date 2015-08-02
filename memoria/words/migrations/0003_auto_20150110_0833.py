# -*- coding: utf-8 -*-
from __future__ import unicode_literals

from django.db import models, migrations
import datetime


class Migration(migrations.Migration):

    dependencies = [
        ('words', '0002_auto_20150110_0832'),
    ]

    operations = [
        migrations.AlterField(
            model_name='words',
            name='dt_created',
            field=models.DateTimeField(null=True, default=datetime.datetime(2015, 1, 10, 8, 33, 30, 931438), verbose_name='fecha hora de creacion'),
            preserve_default=True,
        ),
        migrations.AlterField(
            model_name='words',
            name='dt_updated',
            field=models.DateTimeField(null=True, default=datetime.datetime(2015, 1, 10, 8, 33, 30, 931438), verbose_name='fecha hora update'),
            preserve_default=True,
        ),
    ]
