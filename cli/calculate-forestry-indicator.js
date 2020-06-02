'use strict';

const mysql = require('mysql');
var credentials = require('../.mysql_credentials');
const connection = mysql.createConnection(credentials.get());

connection.connect();

connection.query(`truncate table forestry_indicator`);
connection.query(`
    insert into forestry_indicator (wood_specie_id, avrg_bonitet, avrg_class, avrg_wood_stock, avrg_increase,
                                    operational_fund, operational_wood_stock, economical_section_high,
                                    economical_section_low)
    select ws.id,
           (-- Средний уровень бонитета
               select sum(f.forest_fund * b.code)
                          / sum(f.forest_fund)
               from forest_resources f
                        join bonitet b on b.id = f.bonitet_id
               where f.wood_specie_id = ws.id
           ) as avrg_bonitet,
           (-- Средний возраст класс древесины
               select sum(f.forest_fund * tc.code)
                          / sum(f.forest_fund) * ws.calculation_period
               from forest_resources f
                        join timber_class tc on tc.id = f.timber_class_id
               where f.wood_specie_id = ws.id
           ) as avrg_class,
           (-- Средний запас
               select sum(f.wood_stock) / sum(f.forest_fund)
               from forest_resources f
               where f.wood_specie_id = ws.id
           ) as avrg_wood_stock,
           (-- Средний прирост
               select (sum(f.wood_stock) / sum(f.forest_fund)) -- Средний запас
                          / (sum(f.forest_fund * tc.code)
                                 / sum(f.forest_fund) * ws.calculation_period) -- Средний возраст класс древесины
               from forest_resources f
                        join timber_class tc on tc.id = f.timber_class_id
               where f.wood_specie_id = ws.id
           ) as avrg_increase,
           (-- Эксплуатационный фонд
               select sum(f.forest_fund)
               from forest_resources f
                        join bonitet b on b.id = f.bonitet_id
                        join timber_class tc on tc.id = f.timber_class_id
               where f.wood_specie_id = ws.id
                 and b.code between 1 and 3
                 and tc.code * ws.calculation_period >= ws.timber_harvesting_age
           ) as operational_fund,
           (-- Эксплуатационный запас
               select sum(f.wood_stock)
               from forest_resources f
                        join bonitet b on b.id = f.bonitet_id
                        join timber_class tc on tc.id = f.timber_class_id
               where f.wood_specie_id = ws.id
                 and b.code between 1 and 3
                 and tc.code * ws.calculation_period >= ws.timber_harvesting_age
           ) as operational_wood_stock,
           (-- Хозяйственные секций 1-3
               select sum(f.forest_fund)
               from forest_resources f
                        join bonitet b on b.id = f.bonitet_id
               where f.wood_specie_id = ws.id
                 and b.code between 1 and 3
           ) as economical_section_high,
           (-- Хозяйственные секций остальные
               select sum(f.forest_fund)
               from forest_resources f
                        join bonitet b on b.id = f.bonitet_id
               where f.wood_specie_id = ws.id
                 and b.code NOT between 1 and 3
           ) as economical_section_low
    from wood_specie ws
`);

connection.end();
