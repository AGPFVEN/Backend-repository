import sys
sys.path.append("D:\\python_agpfven\\lib\\site-packages")

with open ("D:\\xampp\\htdocs\\xampp\\Backend-repository\\AGPFVEN\\FSNKU_crisis\\wetransfer-686ade\\Archivo comprimido\\OS1 USA\\X000KI1JEJ.txt", "r", encoding="iso-8859-15") as myfile:
    data = myfile.read().replace("\"", "\\\"")

result = open("D:\\xampp\\htdocs\\xampp\\Backend-repository\\AGPFVEN\\FSNKU_crisis\\wetransfer-686ade\\Archivo comprimido\\OS1 USA\\X000KI1JEJ_result.txt", "w+", encoding="iso-8859-15")
result.write(data)
result.close

print(len(data))