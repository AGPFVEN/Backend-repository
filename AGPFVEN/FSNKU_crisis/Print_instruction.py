import os
import pymysql
import base64

#database connection
connection = pymysql.connect(host="localhost",user="root",passwd="",database="test" )
cursor = connection.cursor()

#data request
request = """ SELECT Code FROM python_table WHERE id = (SELECT COUNT(*) FROM python_table) """
cursor.execute(request)
result = cursor.fetchall()
code_file = result[0][0]

#decoding file
message_bytes = base64.b64decode(code_file)
message = message_bytes.decode("utf-8")

#create file
f = open("python_executer.py", "w+")
f.write(message)

# some other statements  with the help of cursor
connection.close()