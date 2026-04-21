FROM sail-8.5/app

USER root

# Install Oracle dependencies
RUN apt-get update && apt-get install -y \
    libaio1 \
    curl \
    unzip \
    && rm -rf /var/lib/apt/lists/*

# Download and install Oracle Instant Client
RUN mkdir -p /opt/oracle && cd /opt/oracle && \
    curl -o instantclient-basiclite.zip https://download.oracle.com/otn_software/linux/instantclient/2313000/instantclient-basiclite-linux.x64-23.13.0.23.09.zip && \
    unzip -q instantclient-basiclite.zip && \
    rm instantclient-basiclite.zip && \
    echo /opt/oracle/instantclient_23_13 > /etc/ld.so.conf.d/oracle-instantclient.conf && \
    ldconfig

# Install OCI8 PHP extension
RUN pecl install oci8 && \
    echo "extension=oci8.so" > /etc/php/8.5/cli/conf.d/20-oci8.ini

ENV LD_LIBRARY_PATH=/opt/oracle/instantclient_23_13:$LD_LIBRARY_PATH
ENV ORACLE_HOME=/opt/oracle/instantclient_23_13

USER sail

