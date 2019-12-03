import requests
from bs4 import BeautifulSoup


for i in range(5):
    url = 'http://dbria.kr/bbs/board.php?z_page='+str(i)+'&bo_table=search_company_v2&tel_sts=all&cate_no=250'
    response = requests.get(url)
    source = response.text
    soup = BeautifulSoup(source, 'html.parser')
    PC_info = soup.find_all('tr', {'align': 'center'})
    PC_info = soup.find_all('td', {'align': 'left'})
    for i in range(len(PC_info)):
        if(i%2==0):
            print(i," ",PC_info[i])

    for i in range(len(PC_info)):
        if(i%2==1):
            print(i," ",PC_info[i])
#url = 'http://dbria.kr/bbs/board.php?z_page=1&bo_table=search_company_v2&tel_sts=all&cate_no=250'

'''
response = requests.get(url)
source = response.text

#print(source)

soup = BeautifulSoup(source, 'html.parser')


'''
#주소
PC_info = soup.findAll("table")[2].findAll("tr")[2].findAll("td")[2]
#이름
PC_info = soup.findAll("table")[2].findAll("tr")[2].findAll("td")[3]
'''

#주소
#PC_info = soup.findAll("table")
#PC_info = soup.findAll("table")

PC_info = soup.find_all('tr', {'align': 'center'})
PC_info = soup.find_all('td', {'align': 'left'})


print("\n\n\n\n")
print(len(PC_info))
print(PC_info)


for i in range(len(PC_info)):
    if(i%2==0):
        print(i," ",PC_info[i])

for i in range(len(PC_info)):
    if(i%2==1):
        print(i," ",PC_info[i])

'''
