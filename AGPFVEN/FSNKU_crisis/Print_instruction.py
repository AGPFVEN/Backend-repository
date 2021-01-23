import os
import pymysql
import base64

#database connection
connection = pymysql.connect(host="localhost",user="root",passwd="",database="test" )
cursor = connection.cursor()

#data request
request = """ SELECT * FROM python_table WHERE id = (SELECT MAX(id) FROM python_table) """
cursor.execute(request)
result = cursor.fetchall()
id_file = result[0][0]
code_file = result[0][2]
print(code_file)

#decoding file
message_bytes = base64.b64decode(code_file)
message = message_bytes.decode("utf-8")

#create file
f = open("python_executer.py", "w+")
f.write(message)

# #Quit data
# request = """ SELECT Code FROM python_table WHERE id = (SELECT COUNT(id)) """
# cursor.execute(request)

# some other statements  with the help of cursor
connection.close()

#perfectioning prototype
# from python_executer import Print_Out

# Print_Out()

dir(python_executer)

# https://stackoverflow.com/questions/9252543/importerror-cannot-import-name-x