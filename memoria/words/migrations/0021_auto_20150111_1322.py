# -*- coding: utf-8 -*-
from __future__ import unicode_literals

from django.db import models, migrations
from django.utils.timezone import utc
import datetime


class Migration(migrations.Migration):

    dependencies = [
        ('words', '0020_auto_20150111_1049'),
    ]

    operations = [
        migrations.AddField(
            model_name='opciones',
            name='words2',
            field=models.ForeignKey(related_name='fk2_words_opciones', default=1, to='words.Words'),
            preserve_default=True,
        ),
        migrations.AlterField(
            model_name='opciones',
            name='words',
            field=models.ForeignKey(related_name='fk1_words_words', default=1, to='words.Words'),
            preserve_default=True,
        ),
        migrations.AlterField(
            model_name='words',
            name='created',
            field=models.DateTimeField(verbose_name='fecha hora de creacion', null=True, default=datetime.datetime(2015, 1, 11, 18, 22, 41, 849364, tzinfo=utc)),
            preserve_default=True,
        ),
        migrations.AlterField(
            model_name='words',
            name='updated',
            field=models.DateTimeField(verbose_name='fecha hora update', null=True, default=datetime.datetime(2015, 1, 11, 18, 22, 41, 849364, tzinfo=utc)),
            preserve_default=True,
        ),
    ]
