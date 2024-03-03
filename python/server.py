from typing import Union
from fastapi import FastAPI
from langchain_core.prompts import ChatPromptTemplate
from langchain_groq import ChatGroq
from langchain_core.output_parsers import StrOutputParser
from langchain_community.document_loaders import AsyncChromiumLoader
from langchain_community.document_transformers import Html2TextTransformer
from pydantic import BaseModel


app = FastAPI()
html2text = Html2TextTransformer()
output_parser = StrOutputParser()
chat = ChatGroq(temperature=0, model_name="mixtral-8x7b-32768")


@app.post("/scrape")
def read_root(url: str):
    loader = AsyncChromiumLoader([url])
    html = loader.load()
    docs_transformed = html2text.transform_documents(html)
    return {"response": docs_transformed}


class Item(BaseModel):
    data: str
    company_type: str


@app.post("/groq/summarise")
def read_root(item: Item):
    data = item.data
    company_type = item.company_type
    system = "You are helpful assistant whose job is to summarise large amount of text into small meaningul words"
    human = f"""
    Your task is to generate a summary of {company_type} based on the data from the websites
    Write in a concise and professional tone.
    Don't add additional data apart from summary in response.

    Summarize the data below, delimited by triple 
    backticks, 
    data: ```{data}```
"""
    prompt = ChatPromptTemplate.from_messages([("system", system), ("human", human)])
    chain = prompt | chat | output_parser
    response = chain.invoke({"text": "Explain the importance of low latency LLMs."})
    return {"response": response}


class Item2(BaseModel):
    contact_data: str
    company_data: str
    company_type: str
    personalisation_medium: str
    name: str

@app.post("/groq/personalise")
def personalise(item: Item2):
    system = (
        "You are helpful assistant whose job is to create a cold call and email script"
    )
    human = f"""
    Your assignment is to create a personalized cold {item.personalisation_medium} script tailored for {item.name} {item.company_type}, It should look like sended from our company
    utilizing the provided data. Maintain a succinct and professional tone throughout.
    Refrain from including any information beyond the script in your response.
    Here is our company data: {item.company_data}. Make sure to incorporate our company data into the script as much as possible, explaining how our services can benefit the contact.
    Highlight our features and statistics in the script. this scipt is used to market with following contact data. The contact data is provided below, enclosed within triple backticks: {item.contact_data}.```
"""
    prompt = ChatPromptTemplate.from_messages([("system", system), ("human", human)])
    chain = prompt | chat | output_parser
    response = chain.invoke({"text": "Explain the importance of low latency LLMs."})
    return {"response": response}
