# Use an official Python runtime as a parent image
FROM python:3.9

# Set the working directory in the container to /app
WORKDIR /app

# Copy the requirements.txt file into the container
COPY requirements.txt ./

# Install any needed packages specified in requirements.txt
RUN pip install --no-cache-dir -r requirements.txt

# Make port 80 available to the world outside this container
EXPOSE 80

RUN playwright install --with-deps

# Run app.py when the container launches
CMD ["uvicorn", "server:app","--reload", "--host", "0.0.0.0","--port","80"]
