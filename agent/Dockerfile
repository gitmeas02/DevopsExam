FROM jenkins/ssh-agent:latest


# Install essential tools
RUN apt-get update && apt-get install -y \
    curl \
    wget \
    unzip \
    gnupg \
    lsb-release \
    ca-certificates

# Install JDK 23 from Adoptium
RUN mkdir -p /opt/jdk && \
    curl -L -o /tmp/openjdk-23.tar.gz https://github.com/adoptium/temurin23-binaries/releases/download/jdk-23.0.2%2B7/OpenJDK23U-jdk_x64_linux_hotspot_23.0.2_7.tar.gz && \
    tar -xzf /tmp/openjdk-23.tar.gz -C /opt/jdk --strip-components=1 && \
    rm /tmp/openjdk-23.tar.gz

ENV JAVA_HOME=/opt/jdk
ENV PATH="${JAVA_HOME}/bin:${PATH}"

# Install Gradle (latest stable manually)
RUN wget https://services.gradle.org/distributions/gradle-8.7-bin.zip -P /tmp && \
    unzip -d /opt/gradle /tmp/gradle-8.7-bin.zip && \
    ln -s /opt/gradle/gradle-8.7 /opt/gradle/latest && \
    rm /tmp/gradle-8.7-bin.zip

ENV GRADLE_HOME=/opt/gradle/latest
ENV PATH="${GRADLE_HOME}/bin:${PATH}"

# Install PostgreSQL client (latest)
RUN echo "deb [signed-by=/usr/share/keyrings/postgresql.gpg] http://apt.postgresql.org/pub/repos/apt $(lsb_release -cs)-pgdg main" \
    | tee /etc/apt/sources.list.d/pgdg.list && \
    curl -fsSL https://www.postgresql.org/media/keys/ACCC4CF8.asc \
    | gpg --dearmor -o /usr/share/keyrings/postgresql.gpg && \
    apt-get update && \
    apt-get install -y postgresql-client

WORKDIR /var/jenkins_home

