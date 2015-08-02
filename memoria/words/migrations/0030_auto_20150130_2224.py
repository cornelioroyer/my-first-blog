# -*- coding: utf-8 -*-
from __future__ import unicode_literals

from django.db import models, migrations
import datetime
from django.utils.timezone import utc


class Migration(migrations.Migration):

    dependencies = [
        ('words', '0029_auto_20150127_2137'),
    ]

    operations = [
        migrations.AddField(
            model_name='words',
            name='type_question',
            field=models.IntegerField(null=True, default=1),
            preserve_default=True,
        ),
        migrations.AlterField(
            model_name='words',
            name='created',
            field=models.DateTimeField(null=True, default=datetime.datetime(2015, 1, 31, 3, 24, 50, 257131, tzinfo=utc), verbose_name='fecha hora de creacion'),
            preserve_default=True,
        ),
        migrations.AlterField(
            model_name='words',
            name='next_question',
            field=models.DateField(db_index=True, default=datetime.date(2015, 1, 30)),
            preserve_default=True,
        ),
        migrations.AlterField(
            model_name='words',
            name='updated',
            field=models.DateTimeField(null=True, default=datetime.datetime(2015, 1, 31, 3, 24, 50, 257131, tzinfo=utc), verbose_name='fecha hora update'),
            preserve_default=True,
        ),
    ]
