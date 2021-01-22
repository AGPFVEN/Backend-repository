import win32api
def Print_Out():
    file_path = open("File_path.txt", "r")
    win32api.ShellExecute(0, "print", file_path.read(), None, ".", 0)