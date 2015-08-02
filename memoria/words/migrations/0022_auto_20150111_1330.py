# -*- coding: utf-8 -*-
from __future__ import unicode_literals

from django.db import models, migrations
import datetime
from django.utils.timezone import utc


class Migration(migrations.Migration):

    dependencies = [
        ('words', '0021_auto_20150111_1322'),
    ]

    operations = [
        migrations.RemoveField(
            model_name='opciones',
            name='words',
        ),
        migrations.AddField(
            model_name='opciones',
            name='words1',
            field=models.ForeignKey(default=1, related_name='fk_words1', to='words.Words'),
            preserve_default=True,
        ),
        migrations.AlterField(
            model_name='opciones',
            name='words2',
            field=models.ForeignKey(default=1, related_name='fk_words2', to='words.Words'),
            preserve_default=True,
        ),
        migrations.AlterField(
            model_name='words',
            name='created',
            field=models.DateTimeField(default=datetime.datetime(2015, 1, 11, 18, 30, 52, 198096, tzinfo=utc), verbose_name='fecha hora de creacion', null=True),
            preserve_default=True,
        ),
        migrations.AlterField(
            model_name='words',
            name='updated',
            field=models.DateTimeField(default=datetime.datetime(2015, 1, 11, 18, 30, 52, 198096, tzinfo=utc), verbose_name='fecha hora update', null=True),
            preserve_default=True,
        ),
    ]
