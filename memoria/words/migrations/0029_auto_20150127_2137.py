# -*- coding: utf-8 -*-
from __future__ import unicode_literals

from django.db import models, migrations
import datetime
from django.utils.timezone import utc


class Migration(migrations.Migration):

    dependencies = [
        ('words', '0028_auto_20150125_1257'),
    ]

    operations = [
        migrations.AddField(
            model_name='words',
            name='next_question',
            field=models.DateField(default=datetime.date(2015, 1, 27), db_index=True),
            preserve_default=True,
        ),
        migrations.AlterField(
            model_name='words',
            name='created',
            field=models.DateTimeField(default=datetime.datetime(2015, 1, 28, 2, 37, 10, 63305, tzinfo=utc), verbose_name='fecha hora de creacion', null=True),
            preserve_default=True,
        ),
        migrations.AlterField(
            model_name='words',
            name='updated',
            field=models.DateTimeField(default=datetime.datetime(2015, 1, 28, 2, 37, 10, 63305, tzinfo=utc), verbose_name='fecha hora update', null=True),
            preserve_default=True,
        ),
    ]
