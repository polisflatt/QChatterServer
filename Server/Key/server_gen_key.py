import os
import blessed


term = blessed.Terminal()

password = os.urandom(20)

def main():

    if (os.path.exists("key.DO_NOT_CHANGE")):
        print(term.red("KEY IS THERE. DO NOT DELETE IT UNDER ANY CIRCUMSTANCES!"))
        exit(1)
    else:
        print(term.green("WROTE. DO NOT CHANGE."))
        print(password)
        open("key.DO_NOT_CHANGE", "wb").write(password)

    

if __name__ == '__main__':
    main()