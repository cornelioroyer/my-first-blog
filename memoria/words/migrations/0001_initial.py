# -*- coding: utf-8 -*-
from __future__ import unicode_literals

from django.db import models, migrations
import datetime


class Migration(migrations.Migration):

    dependencies = [
    ]

    operations = [
        migrations.CreateModel(
            name='Words',
            fields=[
                ('id', models.AutoField(primary_key=True, auto_created=True, verbose_name='ID', serialize=False)),
                ('english', models.CharField(db_index=True, null=True, unique=True, max_length=300)),
                ('spanish', models.CharField(db_index=True, null=True, unique=True, max_length=300)),
                ('d_spanish', models.CharField(db_index=True, null=True, max_length=300)),
                ('d_english', models.CharField(db_index=True, null=True, max_length=300)),
                ('dt_created', models.DateTimeField(null=True, verbose_name='fecha hora de creacion', default=datetime.datetime(2015, 1, 10, 8, 25, 6, 488939))),
                ('dt_updated', models.DateTimeField(null=True, verbose_name='fecha hora update', default=datetime.datetime(2015, 1, 10, 8, 25, 6, 488939))),
                ('puntos', models.IntegerField(default=0)),
            ],
            options={
            },
            bases=(models.Model,),
        ),
    ]
